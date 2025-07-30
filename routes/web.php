<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentConfigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentHomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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

Route::get('/student/home', [StudentHomeController::class, 'index'])->name('student.home')->middleware('auth');

require __DIR__.'/auth.php';
