<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class StudentParametresController extends Controller
{
    /**
     * Afficher la page des paramètres
     */
    public function index()
    {
        return view('student.parametres');
    }

    /**
     * Mettre à jour le mot de passe de l'utilisateur
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Mot de passe mis à jour avec succès.');
    }

    /**
     * Supprimer le compte de l'utilisateur
     */
    public function destroyAccount(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Votre compte a été supprimé avec succès.');
    }
} 