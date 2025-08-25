<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = [
            ['name' => 'Pemrograman Web', 'day' => 'Senin', 'start_time' => '08:00', 'end_time' => '10:00', 'room' => 'Lab 1'],
            ['name' => 'Algoritma & Struktur Data', 'day' => 'Selasa', 'start_time' => '10:00', 'end_time' => '12:00', 'room' => 'Lab 2'],
        ];

        return view('lectures.index', compact('lectures'));
    }
}
