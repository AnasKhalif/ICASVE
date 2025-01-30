<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FullPaper extends Model
{
    use HasFactory;

    protected $fillable = ['abstract_id', 'file_path', 'status'];

    public function abstract()
    {
        return $this->hasOne(FullPaper::class, 'abstract_id');
    }

    public function fullPaperReviews()
    {
        return $this->hasMany(FullPaperReview::class);
    }

    public function fullPaperDecision()
    {
        return $this->hasOne(FullPaperDecision::class);
    }
}
