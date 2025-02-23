<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceProgram;

class ConferenceProgramDetailsController extends Controller
{
    public function index(Request $request)
{
    $conferences = ConferenceProgram::all();
    $daysAvailable = ConferenceProgram::select('day_number')->distinct()->pluck('day_number');
    $selectedDay = $request->query('day', $daysAvailable->first());
    $programs = ConferenceProgram::where('day_number', $selectedDay)->get();
    return view('landingpage.conference.program', compact('conferences', 'programs', 'daysAvailable', 'selectedDay'));
}
}
