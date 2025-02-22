<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\conference_program;

class ConferenceProgramController extends Controller
{
    public function index()
    {
        $programs = conference_program::all();
        return view('landingpage-editor.conference.conferance-program.index', compact('programs'));
    }
    public function create()
    {
        return view('landingpage-editor.conference.conferance-program.create');
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

        conference_program::create($validatedData);
        return redirect()->route('landing.conferance-program.index')->with('success', 'Conference Program created successfully.');
    }
    public function edit($id)
    {
        $program = conference_program::findOrFail($id);
        return view('landingpage-editor.conference.conferance-program.edit', compact('program'));
    }
    public function update(Request $request, $id)
    {
        $program = conference_program::findOrFail($id);
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
        $program = conference_program::findOrFail($id);
        $program->delete();
        return redirect()->route('landing.conferance-program.index')->with('success', 'Conference Program deleted successfully.');
    }
}
