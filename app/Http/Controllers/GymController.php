<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::withCount('courses')->get();
        return view('admin.gyms.index', compact('gyms'));
    }

    public function create()
    {
        return view('admin.gyms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'  => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays'  => 'required|string|max:255',
        ]);

        Gym::create($request->only('nom', 'ville', 'pays'));

        return redirect()->route('admin.dashboard')->with('success', 'Salle ajoutée.');
    }

    public function destroy($id)
    {
        $gym = Gym::findOrFail($id);
        $gym->delete();

        return back()->with('success', 'Salle supprimée.');
    }
}
