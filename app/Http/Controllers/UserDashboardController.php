<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reservation;

class UserDashboardController extends Controller
{
    public function index()
    {
        $courses = Course::with('gym')
            ->whereColumn('places_reservees', '<', 'places_max')
            ->orderBy('date_heure')
            ->get();

        $mesReservations = Reservation::with('course.gym')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        $coursValides = Reservation::with('course')
            ->where('user_id', auth()->id())
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('user.dashboard', compact('courses', 'mesReservations', 'coursValides'));
    }
}
