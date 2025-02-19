<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbstractLanding extends Model
{
    use HasFactory;

    protected $fillable = ['guideline', 'pdf_template', 'last_updated'];
}
