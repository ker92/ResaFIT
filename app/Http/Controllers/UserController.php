<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['role','subscription','reservations'])
            ->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role && $user->role->name === 'admin') {
            return back()->with('error','Impossible de supprimer un administrateur');
        }

        $user->delete();

        return back()->with('success','Utilisateur supprimé avec succès');
    }
}
