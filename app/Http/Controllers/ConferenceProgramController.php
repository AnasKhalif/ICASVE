<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceProgram;
use App\Models\Conference;

class ConferenceProgramController extends Controller
{
    public function index()
    {
        $programs = ConferenceProgram::all();
        $conferences = Conference::all();
        return view('landingpage.conference.program', compact('programs', 'conferences'));
    }
}
