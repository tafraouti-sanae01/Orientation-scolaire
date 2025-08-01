<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StudentProfilController extends Controller
{
    /**
     * Afficher la page du profil
     */
    public function index()
    {
        return view('student.profil');
    }

    /**
     * Afficher le formulaire de modification du profil
     */
    public function edit()
    {
        return view('student.profil-edit');
    }

    /**
     * Mettre à jour le profil de l'utilisateur
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'age' => 'nullable|integer|min:15|max:100',
            'city' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Homme,Femme,Autre',
            'school' => 'nullable|string|max:255',
            'school_type' => 'nullable|string|max:255',
            'bac_level' => 'nullable|string|max:255',
            'bac_obtenu' => 'nullable|string|max:255',
        ]);

        $request->user()->update($validated);

        return redirect()->route('student.profil')->with('status', 'Profil mis à jour avec succès.');
    }
} 