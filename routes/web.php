<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectureController;     
use App\Http\Controllers\UtbkSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Kuliah
Route::resource('lectures', LectureController::class);

// UTBK
Route::resource('utbk-sessions', UtbkSessionController::class);
