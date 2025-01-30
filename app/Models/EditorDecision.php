<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EditorDecision extends Model
{
    use HasFactory;

    protected $fillable = ['abstract_id', 'editor_id', 'decision'];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function abstract()
    {
        return $this->belongsTo(AbstractModel::class);
    }
}
