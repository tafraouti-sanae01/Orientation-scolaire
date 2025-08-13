<?php

namespace App\Http\Controllers;

use App\Models\Concours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class StudentConcoursController extends Controller
{
    public function index(Request $request)
    {
        // Paginer les concours, 10 par page
        $concours = Concours::paginate(12);

        // Retourner la vue avec la pagination
        return view('student.concours', compact('concours'));
    }
}
