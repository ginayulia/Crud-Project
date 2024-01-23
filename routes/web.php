<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'MyStudents | Kelola Data Mahasiswa Jadi Lebih Mudah']);
})->name('home');

// Router untuk halaman Dashboard
// Resource pada berfungsi menyatukan route Create, Read, Update, Destroy dalam satu router
Route::resource('students', StudentController::class);

// Register Routes...
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

// Login Routes...
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

// Logout Routes...
Route::get('logout', [UserController::class, 'logout'])->name('logout');