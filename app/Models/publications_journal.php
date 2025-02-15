<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publications_journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_type',
        'image_path',
    ];

}
