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

        // Validation et stockage par étape
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
                'preference' => 'required',
        ]);
            $data['preference'] = $validated['preference'];
        }
        if ($step == 5) {
            $validated = $request->validate([
                'name' => 'required',
                'age' => 'required|numeric',
            ]);
            $data['name'] = $validated['name'];
            $data['age'] = $validated['age'];
        }

        // Stocker les données en session
        $request->session()->put('student_config_data', $data);

        // Gestion des étapes
        if ($request->has('prev')) {
            $step = max(1, $step - 1);
        } else {
            $step++;
        }

        // Si terminé, enregistrer en base et vider la session
        if ($step > 5) {
            // Exemple d'enregistrement (à adapter selon ta structure)
            $user = Auth::user();
            $user->update([
                'name' => $data['name'],
                // Ajoute ici les autres champs à enregistrer
            ]);
            $request->session()->forget(['student_config_step', 'student_config_data']);
            return redirect('/student/home')->with('success', 'Configuration terminée !');
        }

        $request->session()->put('student_config_step', $step);
        return redirect()->route('student.config');
    }
}
