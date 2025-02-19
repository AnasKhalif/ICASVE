<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceTitle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'year'];

    public static function getByYear($year)
    {
        return self::where('year', $year)->first();
    }
}
