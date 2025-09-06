<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\ForeignSchool;


class StudentForeignSchoolController extends Controller
{
    public function index()
{
    try {
        $ForeignSchool = ForeignSchool::paginate(9);
        return view('student.ForeignSchool', compact('ForeignSchool'));
    } catch (\Exception $e) {
        $ForeignSchool = collect();
        return view('student.ForeignSchool', compact('ForeignSchool'));
    }
}


} 