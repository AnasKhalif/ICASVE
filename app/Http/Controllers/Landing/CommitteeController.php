<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;

class CommitteeController extends Controller
{
    public function index()
    {
        return view('landingpage-editor.committee.index');
    }
}