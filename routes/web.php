<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', fn() => redirect()->route('login'));

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');















//Route::get('/', [StudentController::class, 'index']);
//Route::get('/students', [StudentController::class, 'index']);
//Route::get('/students/add', [StudentController::class, 'store']);
//Route::get('/students/update/{sid}/{name}', [StudentController::class, 'update']);

//Route::get('/students/delete/{sid}', [StudentController::class, 'delete']);



//Route::get('/', function () {
//   return 'home';
//});

//Route::get('/home', function () {
//    return 'home';
//});

//Route::get('/about', function () {
//   return 'about';
//});

//Route::get('/contact', function () {
//    return 'contact';
//});