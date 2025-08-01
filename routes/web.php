<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentConfigController;
use App\Http\Controllers\StudentParametresController;
use App\Http\Controllers\StudentProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Routes pour les pages du menu étudiant
    Route::get('/student/plan', function () {
        return view('student.plan');
    })->name('student.plan');
    
    Route::get('/student/resultats', function () {
        return view('student.resultats');
    })->name('student.resultats');
    
    Route::get('/student/metiers', function () {
        return view('student.metiers');
    })->name('student.metiers');
    
    Route::get('/student/filieres', function () {
        return view('student.filieres');
    })->name('student.filieres');
    
    Route::get('/student/ecoles', function () {
        return view('student.ecoles');
    })->name('student.ecoles');
    
    Route::get('/student/concours', function () {
        return view('student.concours');
    })->name('student.concours');
    
    Route::get('/student/profil', [StudentProfilController::class, 'index'])->name('student.profil');
    Route::get('/student/profil/edit', [StudentProfilController::class, 'edit'])->name('student.profil.edit');
    Route::put('/student/profil', [StudentProfilController::class, 'update'])->name('student.profil.update');
    
    Route::get('/student/parametres', [StudentParametresController::class, 'index'])->name('student.parametres');
Route::put('/student/parametres/password', [StudentParametresController::class, 'updatePassword'])->name('student.parametres.password');
Route::delete('/student/parametres/account', [StudentParametresController::class, 'destroyAccount'])->name('student.parametres.destroy');
});

Route::get('/ecoles', function () {
    return view('ecoles');
})->name('ecoles');

Route::get('/concours', function () {
    return view('concours');
})->name('concours');

Route::middleware(['auth'])->group(function () {
    Route::get('/student/config', [StudentConfigController::class, 'show'])->name('student.config');
    Route::post('/student/config', [StudentConfigController::class, 'store']);
});

require __DIR__.'/auth.php';
