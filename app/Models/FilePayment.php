<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilePayment extends Model
{
    use HasFactory;

    protected $table = 'files_payment';

    protected $fillable = [
        'user_id',
        'file_path',
        'amount',
        'status',
        'currency'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
