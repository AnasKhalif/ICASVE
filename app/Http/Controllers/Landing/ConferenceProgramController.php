<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConferenceProgram;

class ConferenceProgramController extends Controller
{
    public function index()
    {
        $programs = ConferenceProgram::all();
        return view('landingpage-editor.conferance-program.index', compact('programs'));
    }
    public function create()
    {
        return view('landingpage-editor.conferance-program.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'program_name' => ['required', 'string', 'max:255'],
            'pic' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['pic'] = $validatedData['pic'] ?? '-';

        ConferenceProgram::create($validatedData);
        return redirect()->route('landing.conferance-program.index')->with('success', 'Conference Program created successfully.');
    }
    public function edit($id)
    {
        $program = ConferenceProgram::findOrFail($id);
        return view('landingpage-editor.conferance-program.edit', compact('program'));
    }
    public function update(Request $request, $id)
    {
        $program = ConferenceProgram::findOrFail($id);
        $validatedData = $request->validate([
            'start_time' => ['required'],
            'end_time'   => ['required'],
            'program_name' => ['required', 'string', 'max:255'],
            'pic' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['pic'] = $validatedData['pic'] ?? '-';

        $program->update($validatedData);
        return redirect()->route('landing.conferance-program.index')->with('success', 'Conference Program updated successfully.');
    }
    public function destroy($id)
    {
        $program = ConferenceProgram::findOrFail($id);
        $program->delete();
        return redirect()->route('landing.conferance-program.index')->with('success', 'Conference Program deleted successfully.');
    }
}
