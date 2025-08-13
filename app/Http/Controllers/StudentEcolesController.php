<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;

class StudentEcolesController extends Controller
{
    public function index()
    {
        try {
            $schools = School::paginate(12);
            return view('student.ecoles', compact('schools'));
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une vue avec un tableau vide
            $schools = collect();
            return view('student.ecoles', compact('schools'));
        }
    }
} 