<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    /**
     * Afficher la page de connexion admin
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Traiter la connexion admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérifier les identifiants admin spécifiques
        if ($request->email === 'admin@gmail.com' && $request->password === 'admin123') {
            // Créer ou récupérer l'utilisateur admin
            $admin = User::firstOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'Administrateur',
                    'prenom' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin123'),
                    'profile_completed' => true,
                    'bac_level' => 'bac+3',
                    'bac_field' => 'Sciences',
                    'interests' => json_encode(['Administration', 'Gestion']),
                ]
            );

            // Connecter l'utilisateur
            Auth::login($admin, $request->boolean('remember'));

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Connexion réussie ! Bienvenue dans le panel d\'administration.');
        }

        // Si les identifiants sont incorrects
        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
            ]);
    }

    /**
     * Déconnexion admin
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }
} 