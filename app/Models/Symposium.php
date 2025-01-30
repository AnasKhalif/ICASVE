<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Symposium extends Model
{
    use HasFactory;

    protected $table = 'symposiums';

    protected $fillable = [
        'name',
        'abbreviation',
    ];

    public function abstracts()
    {
        return $this->hasMany(AbstractModel::class);
    }
}
