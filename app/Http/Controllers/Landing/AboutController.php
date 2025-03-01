<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('landingpage-editor.landingpage.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('landingpage-editor.landingpage.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:5',
            'content' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('abouts', 'public') : null;

        About::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
        ]);

        return redirect()->route('landing.abouts.index')->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        return view('landingpage-editor.landingpage.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:5',
            'content' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($about->image);
            $path = $request->file('image')->store('abouts', 'public');
            $about->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $path,
            ]);
        } else {
            $about->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('landing.abouts.index')->with('success', 'About section updated successfully.');
    }

    public function destroy(About $about)
    {
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        $about->delete();

        return redirect()->route('landing.abouts.index')->with('success', 'About section deleted successfully.');
    }
}
