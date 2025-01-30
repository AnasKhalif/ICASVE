<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FullPaperDecision extends Model
{
    use HasFactory;

    protected $fillable = ['full_paper_id', 'editor_id', 'decision'];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function fullPaper()
    {
        return $this->belongsTo(FullPaper::class);
    }
}
