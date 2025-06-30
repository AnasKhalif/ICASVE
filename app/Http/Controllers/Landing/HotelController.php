<?php

namespace App\Http\Controllers\Landing;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('landingpage-editor.information-hotel.index', compact('hotels'));
    }



    public function create()
    {
        return view('landingpage-editor.information-hotel.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'description' => 'nullable',
            'rating' => 'required|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
            'stars' => 'nullable|integer|min:1|max:5',
            'map_url' => 'nullable|url',
        ]);
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hotels', 'public');
        }
    
        Hotel::create($validated);
    
        return redirect()->route('landing.hotels.index')->with('success', 'Hotel created successfully.');
    }


    public function edit(Hotel $hotel)
    {
        return view('landingpage-editor.information-hotel.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'description' => 'nullable',
            'rating' => 'required|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
            'stars' => 'nullable|integer|min:1|max:5',
            'map_url' => 'nullable|url',
        ]);
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hotels', 'public');
        }
    
        $hotel->update($validated);
    
        return redirect()->route('landing.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('landing.hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}