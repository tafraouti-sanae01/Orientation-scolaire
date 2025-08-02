<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class StudentConcoursController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userFavorites = $user->favorites()->pluck('item_id')->toArray();
        
        return view('student.concours', compact('userFavorites'));
    }
} 