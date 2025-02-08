<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class speakers extends Model
{
    protected $table = 'speakers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'role', 'name', 'institution', 'image'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
