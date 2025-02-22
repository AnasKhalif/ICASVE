<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewerCommittee;

class ReviewerLandingPageController extends Controller
{
    public function index()
    {
        $reviewer = ReviewerCommittee::all();
        return view('landingpage.committee.reviewer', compact('reviewer'));
    }
}
