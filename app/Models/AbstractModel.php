<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbstractModel extends Model
{
    use HasFactory;
    protected $table = 'abstracts';
    protected $fillable = [
        'user_id', 'symposium_id', 'title', 'authors', 'affiliations',
        'corresponding_email', 'abstract', 'presentation_type', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function symposium()
    {
        return $this->belongsTo(Symposium::class);
    }

    public function abstractReviews()
    {
        return $this->hasMany(AbstractReview::class);
    }

    public function editorDecision()
    {
        return $this->hasOne(EditorDecision::class);
    }

    public function fullPaper()
    {
        return $this->hasOne(FullPaper::class, 'abstract_id');
    }
}
