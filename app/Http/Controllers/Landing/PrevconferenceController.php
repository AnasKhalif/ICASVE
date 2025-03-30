<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Models\Prevconference;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PrevconferenceController extends Controller
{
    public function index()
    {
        $prevconferences = Prevconference::all();
        return view('landingpage-editor.prevconference.index', compact('prevconferences'));
    }

    public function create()
    {
        return view('landingpage-editor.prevconference.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'keynote' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('prevconferences', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('prevconferences/pdfs', 'public');
            $validatedData['pdf'] = $pdfPath;
        }

        Prevconference::create($validatedData);

        return redirect()->route('landing.prevconference.index')->with('success', 'Prevconference created successfully.');
    }

    public function edit($id)
    {
        $prevconference = Prevconference::findOrFail($id);
        return view('landingpage-editor.prevconference.edit', compact('prevconference'));
    }

    public function update(Request $request, $id)
    {
        $prevconference = Prevconference::findOrFail($id);
        $validatedData = $request->validate([
            'image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'title' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'keynote' => ['string', 'max:255'],
            'date' => ['date'],
            'location' => ['string', 'max:255'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        if ($request->hasFile('image')) {
            if ($prevconference->image) {
                Storage::disk('public')->delete($prevconference->image);
            }
            $imagePath = $request->file('image')->store('prevconferences', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('pdf')) {
            if ($prevconference->pdf) {
                Storage::disk('public')->delete($prevconference->pdf);
            }
            $pdfPath = $request->file('pdf')->store('prevconferences/pdfs', 'public');
            $validatedData['pdf'] = $pdfPath;
        }

        $prevconference->update($validatedData);

        return redirect()->route('landing.prevconference.index')->with('success', 'Prevconference updated successfully.');
    }

    public function destroy($id)
    {
        $prevconference = Prevconference::findOrFail($id);

        if ($prevconference->image) {
            Storage::disk('public')->delete($prevconference->image);
        }

        if ($prevconference->pdf) {
            Storage::disk('public')->delete($prevconference->pdf);
        }

        $prevconference->delete();

        return redirect()->route('landing.prevconference.index')->with('success', 'Prevconference deleted successfully.');
    }
}
