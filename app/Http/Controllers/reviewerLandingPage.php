<?php

namespace App\Http\Controllers;

use App\Models\ReviewerCommittee;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class reviewerLandingPage extends Controller
{
    public function index()
    {
        $reviewer = ReviewerCommittee::all(); 
        return view('landingpage.committee.reviewer', compact('reviewer')); 
    }
    
}
