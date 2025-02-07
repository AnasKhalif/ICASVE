<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_type',
        'certificate_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
