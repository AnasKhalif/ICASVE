<?php

namespace App\Http\Controllers\Landing;
use App\Models\Instagram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class InstagramController extends Controller
{
    public function index()
    {
        $instagramLinks = Instagram::all(); 
        return view('landingpage-editor.instagram.index', compact('instagramLinks'));
    }

    public function create()
    {
        return view('landingpage-editor.instagram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url', 
        ]);

        Instagram::create([
            'link' => $request->link, 
        ]);

        return redirect()->route('landing.instagram.index')->with('success', 'Instagram link berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $instagram = Instagram::findOrFail($id); 
        return view('landingpage-editor.instagram.edit', compact('instagram'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url', 
        ]);

        $instagram = Instagram::findOrFail($id);
        $instagram->update([
            'link' => $request->link, 
        ]);

        return redirect()->route('landing.instagram.index')->with('success', 'Instagram link berhasil diupdate.');
    }

    public function destroy($id)
    {
        $instagram = Instagram::findOrFail($id);
        $instagram->delete(); 

        return redirect()->route('landing.instagram.index')->with('success', 'Instagram link berhasil dihapus.');
    }
}
