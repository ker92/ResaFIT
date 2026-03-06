<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Gym;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('gym')
            ->orderBy('date_heure', 'asc')
            ->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $gyms = Gym::all();
        return view('admin.courses.create', compact('gyms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gym_id'      => 'required|exists:gyms,id',
            'nom'         => 'required|string|max:255',
            'date_heure'  => 'required|date',
            'places_max'  => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Course::create([
            'gym_id'           => $request->gym_id,
            'nom'              => $request->nom,
            'date_heure'       => $request->date_heure,
            'places_max'       => $request->places_max,
            'places_reservees' => 0,
            'description'      => $request->description,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Cours ajouté avec succès.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $gyms   = Gym::all();

        return view('admin.courses.edit', compact('course', 'gyms'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'gym_id'     => 'required|exists:gyms,id',
            'nom'        => 'required|string|max:255',
            'date_heure' => 'required|date',
            'places_max' => 'required|integer|min:1',
        ]);

        if ($request->places_max < $course->places_reservees) {
            return back()->with('error', 'Le nombre de places ne peut pas être inférieur aux places déjà réservées.');
        }

        $course->update([
            'gym_id'     => $request->gym_id,
            'nom'        => $request->nom,
            'date_heure' => $request->date_heure,
            'places_max' => $request->places_max,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Cours mis à jour.');
    }

    public function destroy($id)
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
