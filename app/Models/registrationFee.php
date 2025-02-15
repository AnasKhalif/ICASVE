<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrationFee extends Model
{
    use HasFactory;
   protected $fillable = ['category_name', 'role_type', 'domestic_participants', 'international_participants', 'period_of_payment'];
}
