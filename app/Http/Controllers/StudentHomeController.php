<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentHomeController extends Controller
{
    public function index()
    {
        // Tu peux charger ici les écoles, les favoris, etc.
        return view('student.home');
    }
}
