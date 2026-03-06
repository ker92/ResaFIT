<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(12)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ], [
            'password.min'        => 'Le mot de passe doit contenir au moins 12 caractères.',
            'password.mixed_case' => 'Le mot de passe doit contenir au moins une majuscule et une minuscule.',
            'password.numbers'    => 'Le mot de passe doit contenir au moins un chiffre.',
            'password.symbols'    => 'Le mot de passe doit contenir au moins un symbole (ex: !@#$%).',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => 2,
        ]);

        return redirect('/login')->with('success', 'Compte créé ! Connectez-vous.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Déconnecté avec succès.');
    }
}
