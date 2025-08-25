<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectureController;     
use App\Http\Controllers\UtbkSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lectures', LectureController::class);
Route::resource('utbk-sessions', UtbkSessionController::class);
