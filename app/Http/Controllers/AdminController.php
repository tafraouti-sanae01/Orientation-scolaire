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
        $totalStudents = User::where('email', '!=', 'admin@gmail.com')->count();
        $totalConcours = \App\Models\Concours::count();
        $totalEcoles = \App\Models\School::count();
        $recentStudents = User::where('email', '!=', 'admin@gmail.com')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalStudents', 'totalConcours', 'totalEcoles', 'recentStudents'));
    }

    // Gestion des étudiants
    public function students()
    {
        $students = User::where('email', '!=', 'admin@gmail.com')->latest()->paginate(10);
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
        $concours = \App\Models\Concours::latest()->paginate(10);
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
            'filieres' => 'required|string',
            'places' => 'required|string',
            'conditions' => 'required|string',
            'site' => 'required|string|max:255',
        ]);
        \App\Models\Concours::create($request->only(['name','category','inscription','epreuve','description','filieres','places','conditions','site','status','color']));
        return redirect()->route('admin.concours')->with('success', 'Concours ajouté avec succès');
    }

    public function editConcours($id)
    {
        $concours = \App\Models\Concours::findOrFail($id);
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
            'filieres' => 'required|string',
            'places' => 'required|string',
            'conditions' => 'required|string',
            'site' => 'required|string|max:255',
        ]);
        $concours = \App\Models\Concours::findOrFail($id);
        $concours->update($request->only(['name','category','inscription','epreuve','description','filieres','places','conditions','site','status','color']));
        return redirect()->route('admin.concours')->with('success', 'Concours mis à jour avec succès');
    }

    public function deleteConcours($id)
    {
        $concours = \App\Models\Concours::findOrFail($id);
        $concours->delete();
        return redirect()->route('admin.concours')->with('success', 'Concours supprimé avec succès');
    }

    // Gestion des écoles
    public function ecoles()
    {
        $ecoles = \App\Models\School::latest()->paginate(10);
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
        \App\Models\School::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->desc,
            'type' => $request->type,
            'university' => $request->universite,
            'fees' => $request->frais,
            'category' => $request->category,
            'seuils' => $request->seuils,
        ]);
        return redirect()->route('admin.ecoles')->with('success', 'École ajoutée avec succès');
    }

    public function editEcole($id)
    {
        $ecole = \App\Models\School::findOrFail($id);
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

        $ecole = \App\Models\School::findOrFail($id);
        $ecole->update([
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->desc,
            'type' => $request->type,
            'university' => $request->universite,
            'fees' => $request->frais,
            'category' => $request->category,
            'seuils' => $request->seuils,
        ]);
        return redirect()->route('admin.ecoles')->with('success', 'École mise à jour avec succès');
    }

    public function deleteEcole($id)
    {
        $ecole = \App\Models\School::findOrFail($id);
        $ecole->delete();
        return redirect()->route('admin.ecoles')->with('success', 'École supprimée avec succès');
    }
} 