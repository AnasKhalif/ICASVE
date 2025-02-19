<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewerCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'institution',
        'country',
    ];
}
