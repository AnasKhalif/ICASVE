<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizingCommittee extends Model
{
    use HasFactory;
    protected $fillable = ['category','title', 'name', 'institution'];
}