<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SteeringCommittee extends Model
{
    use HasFactory;
    protected $table = 'steering_committees';
    protected $fillable = ['name', 'institution', 'country', 'year'];
}
