<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceProgram;
use App\Models\Conference;

class ConferenceProgramController extends Controller
{
    public function index(Request $request)
{
    $conferences = Conference::all();
    
    // Ambil daftar hari unik yang tersedia
    $daysAvailable = ConferenceProgram::select('day_number')->distinct()->pluck('day_number');
    
    // Ambil day_number dari request, kalau tidak ada ambil day pertama
    $selectedDay = $request->query('day', $daysAvailable->first());
    
    // Filter program berdasarkan day_number yang dipilih
    $programs = ConferenceProgram::where('day_number', $selectedDay)->get();

    return view('landingpage.conference.program', compact('conferences', 'programs', 'daysAvailable', 'selectedDay'));
}


}
