<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/Jams', \App\Http\Controllers\JamController::class);
Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);
Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home',  [UserController::class, 'index'])->name('home');

Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

