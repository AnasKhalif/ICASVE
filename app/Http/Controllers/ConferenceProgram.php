<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conference_program;

class ConferenceProgram extends Controller
{
    public function index()
    {
        $programs = conference_program::all();
        return view('landingpage.conference.program', compact('programs'));
    }
}
