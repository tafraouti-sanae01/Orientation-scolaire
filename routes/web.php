<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentConfigController;
use App\Http\Controllers\StudentParametresController;
use App\Http\Controllers\StudentProfilController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
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
    
    Route::get('/student/ecoles', [App\Http\Controllers\StudentEcolesController::class, 'index'])->name('student.ecoles');
    
    Route::get('/student/concours', [App\Http\Controllers\StudentConcoursController::class, 'index'])->name('student.concours');
    
    Route::get('/student/profil', [StudentProfilController::class, 'index'])->name('student.profil');
    Route::get('/student/profil/edit', [StudentProfilController::class, 'edit'])->name('student.profil.edit');
    Route::put('/student/profil', [StudentProfilController::class, 'update'])->name('student.profil.update');
    
    Route::get('/student/parametres', [StudentParametresController::class, 'index'])->name('student.parametres');
    Route::put('/student/parametres/password', [StudentParametresController::class, 'updatePassword'])->name('student.parametres.password');
    Route::delete('/student/parametres/account', [StudentParametresController::class, 'destroyAccount'])->name('student.parametres.destroy');

    // Routes pour les favoris
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'getFavorites'])->name('favorites.get');
    
    Route::get('/student/config', [StudentConfigController::class, 'show'])->name('student.config');
    Route::post('/student/config', [StudentConfigController::class, 'store']);
});

// Routes Admin Auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
});

// Routes Admin (protégées)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des étudiants
    Route::get('/students', [App\Http\Controllers\AdminController::class, 'students'])->name('students');
    Route::get('/students/{id}/edit', [App\Http\Controllers\AdminController::class, 'editStudent'])->name('students.edit');
    Route::put('/students/{id}', [App\Http\Controllers\AdminController::class, 'updateStudent'])->name('students.update');
    Route::delete('/students/{id}', [App\Http\Controllers\AdminController::class, 'deleteStudent'])->name('students.delete');
    
    // Gestion des concours
    Route::get('/concours', [App\Http\Controllers\AdminController::class, 'concours'])->name('concours');
    Route::get('/concours/create', [App\Http\Controllers\AdminController::class, 'createConcours'])->name('concours.create');
    Route::post('/concours', [App\Http\Controllers\AdminController::class, 'storeConcours'])->name('concours.store');
    Route::get('/concours/{id}/edit', [App\Http\Controllers\AdminController::class, 'editConcours'])->name('concours.edit');
    Route::put('/concours/{id}', [App\Http\Controllers\AdminController::class, 'updateConcours'])->name('concours.update');
    Route::delete('/concours/{id}', [App\Http\Controllers\AdminController::class, 'deleteConcours'])->name('concours.delete');
    
    // Gestion des écoles
    Route::get('/ecoles', [App\Http\Controllers\AdminController::class, 'ecoles'])->name('ecoles');
    Route::get('/ecoles/create', [App\Http\Controllers\AdminController::class, 'createEcole'])->name('ecoles.create');
    Route::post('/ecoles', [App\Http\Controllers\AdminController::class, 'storeEcole'])->name('ecoles.store');
    Route::get('/ecoles/{id}/edit', [App\Http\Controllers\AdminController::class, 'editEcole'])->name('ecoles.edit');
    Route::put('/ecoles/{id}', [App\Http\Controllers\AdminController::class, 'updateEcole'])->name('ecoles.update');
    Route::delete('/ecoles/{id}', [App\Http\Controllers\AdminController::class, 'deleteEcole'])->name('ecoles.delete');
});

Route::get('/ecoles', function () {
    return view('ecoles');
})->name('ecoles');

Route::get('/concours', function () {
    return view('concours');
})->name('concours');

require __DIR__.'/auth.php';