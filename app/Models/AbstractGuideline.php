<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbstractGuideline extends Model {
    use HasFactory;

    protected $fillable = ['year', 'content', 'pdf_file'];
}
