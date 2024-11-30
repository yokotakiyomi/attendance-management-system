<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/stamping', [AttendanceController::class, 'index'])->name('stamping');
Route::post('/stamping', [AttendanceController::class, 'handleStamping'])->middleware('auth');

Route::get('/attendance', [AttendanceController::class, 'show'])->middleware('auth');
