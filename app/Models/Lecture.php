<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'lecturer', 'date', 'start_time', 'end_time', 'room'
    ];

    // Casting otomatis date jadi Carbon
    protected $casts = [
        'date' => 'date',
    ];

    // Day otomatis diambil dari date
    public function getDayAttribute()
    {
        return $this->date->translatedFormat('l'); // Senin, Selasa, dll
    }
}
