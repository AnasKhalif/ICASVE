<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\ConferenceDetail;
use App\Models\ConferenceProgram;
use Illuminate\Http\Request;

class ConferenceProgramController extends Controller
{
    public function showLandingPage(Request $request)
    {
        $conferences = ConferenceDetail::all();
        
        // Ambil daftar hari unik yang tersedia
        $daysAvailable = ConferenceProgram::select('day_number')->distinct()->pluck('day_number');
        
        // Ambil day_number dari request, kalau tidak ada ambil day pertama
        $selectedDay = $request->query('day', $daysAvailable->first());
        
        // Filter program berdasarkan day_number yang dipilih
        $programs = ConferenceProgram::where('day_number', $selectedDay)->get();
      
        return view('landingpage.conference.program', compact('conferences', 'programs', 'daysAvailable', 'selectedDay'));
        
    }

    public function index(Request $request)
    {
        $years = ConferenceProgram::selectRaw('DISTINCT year')->orderBy('year', 'desc')->pluck('year');

        $query = ConferenceProgram::query();

        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }

        $programs = $query->orderBy('year', 'desc')->orderBy('day_number')->orderBy('start_time')->paginate(10);

        return view('landingpage-editor.conference.conference-program.index', compact('programs', 'years'));
    }

    public function create()
    {
        return view('landingpage-editor.conference.conference-program.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'year' => ['required', 'integer'],
            'day_number' => ['required', 'integer'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'program_name' => ['required', 'string', 'max:255'],
            'pic' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['pic'] = $validatedData['pic'] ?? '-';

        ConferenceProgram::create($validatedData);
        return redirect()->route('landing.conference-program.index')->with('success', 'Conference Program created successfully.');
    }

    public function edit($id)
    {
        $program = ConferenceProgram::findOrFail($id);
        return view('landingpage-editor.conference.conference-program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = ConferenceProgram::findOrFail($id);

        $validatedData = $request->validate([
            'year' => ['required', 'integer'],
            'day_number' => ['required', 'integer'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'program_name' => ['required', 'string', 'max:255'],
            'pic' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['pic'] = $validatedData['pic'] ?? '-';

        $program->update($validatedData);
        return redirect()->route('landing.conference-program.index')->with('success', 'Conference Program updated successfully.');
    }

    public function destroy($id)
    {
        $program = ConferenceProgram::findOrFail($id);
        $program->delete();
        return redirect()->route('landing.conference-program.index')->with('success', 'Conference Program deleted successfully.');
    }
}
