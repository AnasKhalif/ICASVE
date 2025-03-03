<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConferenceProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 
        'day_number',
        'start_time',
        'end_time',
        'program_name',
        'pic',
    ];
}
