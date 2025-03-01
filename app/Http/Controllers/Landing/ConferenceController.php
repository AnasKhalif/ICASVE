<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('landingpage-editor.conference.index', compact('conferences'));
    }

    public function create()
    {
        return view('landingpage-editor.conference.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'hosted' => 'required|string|max:255',
            'date' => 'required|string|max:255',
        ]);
        Conference::create($validate);
        return redirect()->route('landing.conference.index')->with('success', 'Conference created successfully.');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('landingpage-editor.conference.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'hosted' => 'required|string|max:255',
            'date' => 'required|string|max:255',
        ]);
        Conference::findOrFail($id)->update($validate);
        return redirect()->route('landing.conference.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy($id)
    {
        Conference::findOrFail($id)->delete();
        return redirect()->route('landing.conference.index')->with('success', 'Conference deleted successfully.');
    }
}
