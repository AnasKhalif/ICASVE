<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = gallery::all();
        return view('landingpage-editor.gallery.index', compact('gallery'));
    }
    public function create()
    {
        return view('landingpage-editor.gallery.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'image_path' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'],
            'year' => ['required', 'integer']
        ]);
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('gallery', 'public');
            $validateData['image_path'] = $imagePath;
        }
        gallery::create($validateData);
        return redirect()->route('landing.gallery.index')->with('success', 'Gallery created successfully.');
    }
    public function edit($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('landingpage-editor.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = gallery::findOrFail($id);

        $validateData = $request->validate([
            'image_path' => ['file', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'],
            'year' => ['required', 'integer']
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('gallery', 'public');
            $validateData['image_path'] = $imagePath;
        }

        $gallery->update($validateData);

        return redirect()->route('landing.gallery.index')->with('success', 'Gallery updated successfully.');
    }
    public function destroy($id)
    {
        $gallery = gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('landing.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
