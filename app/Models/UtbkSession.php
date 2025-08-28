<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtbkSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'date',
        'start_time',
        'end_time',
        'notes',
        'is_done',
    ];
}
