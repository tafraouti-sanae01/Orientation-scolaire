<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentConfigController extends Controller
{
    public function show(Request $request)
    {
        $step = $request->session()->get('student_config_step', 1);
        $data = $request->session()->get('student_config_data', []);
        return view('student.config', compact('step', 'data'));
    }

    public function store(Request $request)
    {
        $step = $request->session()->get('student_config_step', 1);
        $data = $request->session()->get('student_config_data', []);

        // Si on clique sur "Retour", on décrémente l'étape et on ne valide rien
        if ($request->has('prev')) {
            $step = max(1, $step - 1);
            $request->session()->put('student_config_step', $step);
            return redirect()->route('student.config');
        }

        // Sinon, on valide et on passe à l'étape suivante
        if ($step == 1) {
            $validated = $request->validate([
                'bac_level' => 'required',
            ]);
            $data['bac_level'] = $validated['bac_level'];
        }
        if ($step == 2) {
            $validated = $request->validate([
                'bac_lang' => 'required',
            ]);
            $data['bac_lang'] = $validated['bac_lang'];
        }
        if ($step == 3) {
            $validated = $request->validate([
                'bac_field' => 'required',
            ]);
            $data['bac_field'] = $validated['bac_field'];
        }
        if ($step == 4) {
            $validated = $request->validate([
                'university_type' => 'required',
                'services' => 'nullable|array',
                'budget' => 'required',
                'study_abroad' => 'required',
                'cities' => 'nullable|string',
                'languages' => 'nullable|array',
            ]);
            $data['university_type'] = $validated['university_type'];
            $data['services'] = $validated['services'] ?? [];
            $data['budget'] = $validated['budget'];
            $data['study_abroad'] = $validated['study_abroad'];
            $data['cities'] = $validated['cities'] ?? '';
            $data['languages'] = $validated['languages'] ?? [];
        }
        if ($step == 5) {
            $validated = $request->validate([
                'name' => 'required',
                'prenom' => 'required',
                'email' => 'required|email',
                'school' => 'nullable|string',
                'age' => 'required|numeric',
                'city' => 'required|string',
                'gender' => 'required|in:homme,femme',
                'school_type' => 'required|in:prive,public',
                'bac_obtenu' => 'required|string',
            ]);
            $data = array_merge($data, $validated);
        }

        // Stocker les données en session
        $request->session()->put('student_config_data', $data);

        // Passer à l'étape suivante
        $step++;
        $request->session()->put('student_config_step', $step);

        // Si terminé, enregistrer en base et vider la session
        if ($step > 5) {
            // Enregistrer toutes les données du profil étudiant
            $user = Auth::user();
            $user->update([
                'name' => $data['name'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'school' => $data['school'] ?? null,
                'age' => $data['age'],
                'city' => $data['city'],
                'gender' => $data['gender'],
                'school_type' => $data['school_type'],
                'bac_obtenu' => $data['bac_obtenu'],
                'bac_level' => $data['bac_level'] ?? null,
                'bac_lang' => $data['bac_lang'] ?? null,
                'bac_field' => $data['bac_field'] ?? null,
                'university_type' => $data['university_type'] ?? null,
                'services' => json_encode($data['services'] ?? []),
                'budget' => $data['budget'] ?? null,
                'study_abroad' => $data['study_abroad'] ?? null,
                'cities' => $data['cities'] ?? null,
                'languages' => json_encode($data['languages'] ?? []),
                'profile_completed' => true, // Marquer le profil comme complété
            ]);
            $request->session()->forget(['student_config_step', 'student_config_data']);
            return redirect('/dashboard')->with('success', 'Configuration terminée !');
        }

        return redirect()->route('student.config');
    }
}
