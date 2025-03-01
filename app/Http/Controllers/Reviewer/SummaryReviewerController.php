<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryReviewerController extends Controller
{
    public function index()
    {
        return view('reviewer.summary');
    }
}
