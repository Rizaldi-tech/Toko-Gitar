<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('/Jams', \App\Http\Controllers\JamController::class);
Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
