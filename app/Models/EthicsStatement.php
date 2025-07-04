<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthicsStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'content',
        'pdf_file'
    ];

    protected $casts = [
        'year' => 'integer',
    ];
}
