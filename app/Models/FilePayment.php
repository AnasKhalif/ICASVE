<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePayment extends Model
{
    use HasFactory;

    protected $table = 'files_payment';
    protected $fillable = [
        'user_id', 'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

