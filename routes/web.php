<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/edit', [AuthController::class, 'showEdit'])->name('user.edit');
    Route::post('/edit', [AuthController::class, 'edit'])->name('user.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
