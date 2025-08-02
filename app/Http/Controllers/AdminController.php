<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{


    public function dashboard()
    {
        $totalStudents = User::count();
        $totalFavorites = Favorite::count();
        $recentStudents = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalStudents', 'totalFavorites', 'recentStudents'));
    }

    // Gestion des étudiants
    public function students()
    {
        $students = User::latest()->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function editStudent($id)
    {
        $student = User::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function updateStudent(Request $request, $id)
    {
        $student = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($student->id)],
            'age' => 'nullable|integer|min:16|max:100',
            'city' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Homme,Femme',
            'school' => 'nullable|string|max:255',
            'school_type' => 'nullable|string|max:255',
            'bac_level' => 'nullable|string|max:255',
            'bac_obtenu' => 'nullable|string|max:255',
        ]);

        $student->update($request->all());
        
        return redirect()->route('admin.students')->with('success', 'Profil étudiant mis à jour avec succès');
    }

    public function deleteStudent($id)
    {
        $student = User::findOrFail($id);
        $student->favorites()->delete(); // Supprimer les favoris
        $student->delete();
        
        return redirect()->route('admin.students')->with('success', 'Étudiant supprimé avec succès');
    }

    // Gestion des concours
    public function concours()
    {
        $concours = [
            [
                'id' => 1,
                'name' => 'CNC - Grandes Écoles d\'Ingénieurs',
                'category' => 'ingenieur',
                'inscription' => '20 juin - 10 juillet 2025',
                'epreuve' => 'Mai 2025',
                'description' => 'Concours National Commun - Réservé aux bacheliers de classes préparatoires (MP, TSI, PSI...)',
                'filières' => 'EMI, ENSIAS, ENSEM, IAV, INPT, INSEA, ENSA...',
                'places' => '185 MP, 44 TSI, 37 PSI (ENSIAS)',
                'conditions' => 'Classes préparatoires MP, TSI, PSI',
                'site' => 'amci.ma'
            ],
            // Ajoutez d'autres concours ici
        ];
        
        return view('admin.concours.index', compact('concours'));
    }

    public function createConcours()
    {
        return view('admin.concours.create');
    }

    public function storeConcours(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'inscription' => 'required|string|max:255',
            'epreuve' => 'required|string|max:255',
            'description' => 'required|string',
            'filières' => 'required|string',
            'places' => 'required|string',
            'conditions' => 'required|string',
            'site' => 'required|string|max:255',
        ]);

        // Ici vous pouvez ajouter la logique pour sauvegarder dans la base de données
        // Pour l'instant, on simule l'ajout
        
        return redirect()->route('admin.concours')->with('success', 'Concours ajouté avec succès');
    }

    public function editConcours($id)
    {
        // Simuler la récupération d'un concours
        $concours = [
            'id' => $id,
            'name' => 'CNC - Grandes Écoles d\'Ingénieurs',
            'category' => 'ingenieur',
            'inscription' => '20 juin - 10 juillet 2025',
            'epreuve' => 'Mai 2025',
            'description' => 'Concours National Commun - Réservé aux bacheliers de classes préparatoires (MP, TSI, PSI...)',
            'filières' => 'EMI, ENSIAS, ENSEM, IAV, INPT, INSEA, ENSA...',
            'places' => '185 MP, 44 TSI, 37 PSI (ENSIAS)',
            'conditions' => 'Classes préparatoires MP, TSI, PSI',
            'site' => 'amci.ma'
        ];
        
        return view('admin.concours.edit', compact('concours'));
    }

    public function updateConcours(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'inscription' => 'required|string|max:255',
            'epreuve' => 'required|string|max:255',
            'description' => 'required|string',
            'filières' => 'required|string',
            'places' => 'required|string',
            'conditions' => 'required|string',
            'site' => 'required|string|max:255',
        ]);

        // Ici vous pouvez ajouter la logique pour mettre à jour dans la base de données
        
        return redirect()->route('admin.concours')->with('success', 'Concours mis à jour avec succès');
    }

    public function deleteConcours($id)
    {
        // Ici vous pouvez ajouter la logique pour supprimer de la base de données
        
        return redirect()->route('admin.concours')->with('success', 'Concours supprimé avec succès');
    }

    // Gestion des écoles
    public function ecoles()
    {
        $ecoles = [
            [
                'id' => 1,
                'name' => 'ENSA - École Nationale des Sciences Appliquées',
                'category' => 'ingenieur',
                'desc' => 'Formation d\'ingénieurs en sciences appliquées. Institution reconnue pour l\'excellence académique et l\'employabilité de ses diplômés.',
                'type' => 'Public',
                'universite' => 'Multiples universités',
                'frais' => 'Gratuit',
                'seuils' => 'SM ≥12, PC ≥14.5, SVT/Tech ≥15'
            ],
            // Ajoutez d'autres écoles ici
        ];
        
        return view('admin.ecoles.index', compact('ecoles'));
    }

    public function createEcole()
    {
        return view('admin.ecoles.create');
    }

    public function storeEcole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'desc' => 'required|string',
            'type' => 'required|string|max:255',
            'universite' => 'required|string|max:255',
            'frais' => 'required|string|max:255',
            'seuils' => 'required|string',
        ]);

        // Ici vous pouvez ajouter la logique pour sauvegarder dans la base de données
        
        return redirect()->route('admin.ecoles')->with('success', 'École ajoutée avec succès');
    }

    public function editEcole($id)
    {
        // Simuler la récupération d'une école
        $ecole = [
            'id' => $id,
            'name' => 'ENSA - École Nationale des Sciences Appliquées',
            'category' => 'ingenieur',
            'desc' => 'Formation d\'ingénieurs en sciences appliquées. Institution reconnue pour l\'excellence académique et l\'employabilité de ses diplômés.',
            'type' => 'Public',
            'universite' => 'Multiples universités',
            'frais' => 'Gratuit',
            'seuils' => 'SM ≥12, PC ≥14.5, SVT/Tech ≥15'
        ];
        
        return view('admin.ecoles.edit', compact('ecole'));
    }

    public function updateEcole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'desc' => 'required|string',
            'type' => 'required|string|max:255',
            'universite' => 'required|string|max:255',
            'frais' => 'required|string|max:255',
            'seuils' => 'required|string',
        ]);

        // Ici vous pouvez ajouter la logique pour mettre à jour dans la base de données
        
        return redirect()->route('admin.ecoles')->with('success', 'École mise à jour avec succès');
    }

    public function deleteEcole($id)
    {
        // Ici vous pouvez ajouter la logique pour supprimer de la base de données
        
        return redirect()->route('admin.ecoles')->with('success', 'École supprimée avec succès');
    }
} 