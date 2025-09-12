<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Redirect root to login
Route::get('/', fn() => redirect()->route('login'));

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Secure logout (POST only)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Delete User
Route::delete('/users/{id}', [StudentController::class, 'destroy'])->name('users.destroy');

// Show the edit form
Route::get('/users/{id}/edit', [StudentController::class, 'edit'])->name('users.edit');

// Handle the form submission
Route::post('/users/{id}/edit', [StudentController::class, 'updateFromEdit'])->name('users.edit.submit');


// Handle GET /logout gracefully (do not log out, just redirect)
Route::get('/logout', function () {
    return redirect()->route('login');
});

// Dashboard (protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
    Route::get('/users', [StudentController::class, 'index'])->name('users.index');
});