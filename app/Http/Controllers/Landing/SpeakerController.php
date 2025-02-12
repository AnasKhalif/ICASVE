<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return view('landingpage.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('landingpage.speakers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'image' => ['required', 'file', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        }

        Speaker::create([
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'institution' => $validatedData['institution'],
            'image' => $validatedData['image'],
        ]);

        return redirect()->route('landing.speakers.index')->with('success', 'Speaker created successfully.');
    }

    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('landingpage.speakers.edit', compact('speaker'));
    }

    public function update(Request $request, $id)
    {
        $speaker = Speaker::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'image', 'max:2048'],
        ]);
        if ($request->hasFile('image')) {
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }

            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        } else {
            $validatedData['image'] = $speaker->image;
        }
        $speaker->update($validatedData);
        return redirect()->route('landing.speakers.index')->with('success', 'Speaker updated successfully.');
    }

    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();
        return redirect()->route('landing.speakers.index')->with('success', 'Speaker deleted successfully.');
    }
}
