<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceProgram;

class ConferenceProgramController extends Controller
{
    public function index()
    {
        $programs = ConferenceProgram::all();
        return view('landingpage.conference.program', compact('programs'));
    }
}
