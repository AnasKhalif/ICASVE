<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $fillable = [
        'type', 'file_path',
    ];

    public static function getFilePath($type)
    {
        $upload = self::where('type', $type)->first();
        return $upload ? asset('storage/' . $upload->file_path) : null;
    }
}
