<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'description',
        'rating',
        'reviews_count',
        'stars',
        'image',
        'map_url',
    ];

    public function getRatingAttribute($value)
    {
        return number_format($value, 1);
    }
}
