<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForeignSchool;
use Illuminate\Http\Request;

class ForeignSchoolController extends Controller
{
    public function index()
    {
        $schools = ForeignSchool::latest()->paginate(10);
        return view('admin.foreign-schools.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.foreign-schools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'is_free' => 'required|boolean',
            'description' => 'required|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'type'=> 'required|string|max:255',
            'admission_requirements' => 'nullable|string',
            'language_requirements' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('foreign-schools', 'public');
            $validated['image'] = $path;
        }

        ForeignSchool::create($validated);

        return redirect()->route('admin.foreign-schools.index')
            ->with('success', 'École étrangère ajoutée avec succès');
    }

    public function edit($id)
    {
        $ecole = ForeignSchool::findOrFail($id);
        return view('admin.foreign-schools.edit', compact('ecole'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'is_free' => 'required|boolean',
            'description' => 'required|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'type'=> 'required|string|max:255',
            'admission_requirements' => 'nullable|string',
            'language_requirements' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $ecole = ForeignSchool::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('foreign-schools', 'public');
            $validated['image'] = $path;
        }

        $ecole->update($validated);

        return redirect()->route('admin.foreign-schools.index')
            ->with('success', 'École mise à jour avec succès');
    }

    public function destroy($id)
    {
        $ecole = ForeignSchool::findOrFail($id);
        $ecole->delete();

        return redirect()->route('admin.foreign-schools.index')
            ->with('success', 'École supprimée avec succès');
    }
}
