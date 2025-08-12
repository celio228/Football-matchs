<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
         $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // ✅ Redirection après connexion réussie
        return redirect()->route('home');
    }

    // Échec de l'authentification
    return back()->withErrors([
        'email' => 'Identifiants invalides.',
    ]);
    }

    public function logout()
    {
        // Log the user out
        Auth::logout();
        // Invalidate the session
        request()->session()->invalidate();
        // Regenerate the CSRF token
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    }

    }

   