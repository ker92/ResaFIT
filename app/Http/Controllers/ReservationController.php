<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Course;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('course.gym')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $courses = Course::with('gym')
            ->whereColumn('places_reservees', '<', 'places_max')
            ->orderBy('date_heure')
            ->get();

        return view('reservations.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'         => 'required|exists:courses,id',
            'type_cours'        => 'required|string',
            'date_reservation'  => 'required|date',
            'heure_reservation' => 'required',
            'lieu'              => 'required|string',
        ]);

        $course = Course::findOrFail($request->course_id);

        if ($course->estComplet()) {
            return back()->with('error', 'Ce cours est complet.');
        }

        $dejaReserve = Reservation::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($dejaReserve) {
            return back()->with('error', 'Vous avez déjà une réservation pour ce cours.');
        }

        Reservation::create([
            'user_id'           => auth()->id(),
            'course_id'         => $course->id,
            'type_cours'        => $request->type_cours,
            'date_reservation'  => $request->date_reservation,
            'heure_reservation' => $request->heure_reservation,
            'lieu'              => $request->lieu,
            'status'            => 'pending',
        ]);

        return redirect()
            ->route('user.dashboard')
            ->with('success', "Réservation envoyée à l'administrateur.");
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())
            ->findOrFail($id);

        if ($reservation->status === 'approved') {
            return back()->with('error', 'Impossible de supprimer une réservation validée.');
        }

        $reservation->delete();

        return back()->with('success', 'Réservation supprimée.');
    }
}
