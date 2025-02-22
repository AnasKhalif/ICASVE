<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewerCommittee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'institution', 'country', 'year'];
}
