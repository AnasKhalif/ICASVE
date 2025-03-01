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
        return $this->hasMany(AbstractReview::class, 'abstract_id');
    }

    public function fullPaper()
    {
        return $this->hasOne(FullPaper::class, 'abstract_id');
    }

    public function reviewers()
    {
        return $this->belongsToMany(User::class, 'abstract_reviews', 'abstract_id', 'reviewer_id')->withPivot(['comment', 'recommendation'])->withTimestamps();
    }

    public function filePayment()
    {
        return $this->hasOne(FilePayment::class, 'user_id', 'user_id');
    }
}
