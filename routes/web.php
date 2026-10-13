<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/hello', [HomeController::class, 'hello']);
Route::get('/student', [HomeController::class, 'student']);
//Route::get('/student/{id}', [HomeController::class, 'student']);

Route::get('/login', [LoginController::class, 'showLoginForm'])
          ->middleware('guest')
          ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])
          ->middleware('auth');

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
          ->middleware('auth')
          ->name('admin.dashboard');

Route::get('/student/dashboard', [DashboardController::class, 'student'])
          ->middleware('auth')
          ->name('student.dashboard');

Route::post('/logout', [LoginController::class, 'logout'])
          ->middleware('auth')
          ->name('logout');