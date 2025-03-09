<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('landingpage-editor.venue.index', compact('venues'));
    }

    public function create()
    {
        return view('landingpage-editor.venue.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_path' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'venue_name' => ['required', 'string', 'max:255', 'min:3'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'date' => ['required', 'date'],
            'link_map' => ['required', 'url'],
            'map' => ['required', 'string', 'min:10'],
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('venues', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        Venue::create($validatedData);

        return redirect()->route('landing.venue.index')->with('success', 'Venue created successfully.');
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('landingpage-editor.venue.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);
        $validatedData = $request->validate([
            'image_path' => ['file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'venue_name' => ['string', 'max:255', 'min:3'],
            'address' => ['string', 'max:255', 'min:10'],
            'date' => ['date'],
            'link_map' => ['url'],
            'map' => ['string', 'min:10'],
        ]);

        if ($request->hasFile('image_path')) {
            if ($venue->image_path) {
                Storage::disk('public')->delete($venue->image_path);
            }
            $imagePath = $request->file('image_path')->store('venues', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $venue->update($validatedData);

        return redirect()->route('landing.venue.index')->with('success', 'Venue updated successfully.');
    }

    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        if ($venue->image_path) {
            Storage::disk('public')->delete($venue->image_path);
        }
        $venue->delete();
        return redirect()->route('landing.venue.index')->with('success', 'Venue deleted successfully.');
    }
}
