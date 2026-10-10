<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/hello', [HomeController::class, 'hello']);
Route::get('/student', [HomeController::class, 'student']);
Route::get('/student/{id}', [HomeController::class, 'student']);

Route::get('/login', function(){
  return view('auth.login');
});

Route::post('/login', function () {
    return 'Login form received';
});