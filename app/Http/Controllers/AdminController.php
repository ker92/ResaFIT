<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Reservation;
use App\Models\Gym;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmedMail;
use App\Mail\ReservationRejectedMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingReservations = Reservation::with(['user', 'course.gym'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        $approvedReservations = Reservation::where('status', 'approved')->count();
        $courses = Course::with('gym')->latest()->get();
        $users   = User::where('role_id', '!=', 1)->latest()->get();
        $gyms    = Gym::all();

        return view('admin.dashboard', compact(
            'pendingReservations',
            'approvedReservations',
            'courses',
            'users',
            'gyms'
        ));
    }

    public function validateReservation($id)
    {
        $reservation = Reservation::with(['user', 'course'])->findOrFail($id);

        if ($reservation->status !== 'pending') {
            return back()->with('error', 'Cette réservation a déjà été traitée.');
        }

        $course = $reservation->course;

        if ($course && $course->places_reservees >= $course->places_max) {
            return back()->with('error', 'Plus de places disponibles pour ce cours.');
        }

        $reservation->update(['status' => 'approved']);

        if ($course) {
            $course->increment('places_reservees');
        }

        Mail::to($reservation->user->email)
            ->send(new ReservationConfirmedMail($reservation));

        return back()->with('success', 'Réservation validée et email envoyé.');
    }

    public function rejectReservation($id)
    {
        $reservation = Reservation::with('user')->findOrFail($id);

        if ($reservation->status !== 'pending') {
            return back()->with('error', 'Cette réservation a déjà été traitée.');
        }

        $reservation->update(['status' => 'rejected']);

        Mail::to($reservation->user->email)
            ->send(new ReservationRejectedMail($reservation));

        return back()->with('success', 'Réservation refusée et email envoyé.');
    }

    public function deleteReservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status === 'approved' && $reservation->course) {
            $reservation->course->decrement('places_reservees');
        }

        $reservation->delete();

        return back()->with('success', 'Réservation supprimée.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->isAdmin()) {
            return back()->with('error', 'Impossible de supprimer un administrateur.');
        }

        $user->delete();

        return back()->with('success', 'Utilisateur supprimé.');
    }

    public function destroyCourse($id)
    {
        $course = Course::with('reservations')->findOrFail($id);

        if ($course->reservations()->where('status', 'approved')->exists()) {
            return back()->with('error', 'Impossible de supprimer un cours avec des réservations validées.');
        }

        $course->reservations()->delete();
        $course->delete();

        return back()->with('success', 'Cours supprimé.');
    }
}
