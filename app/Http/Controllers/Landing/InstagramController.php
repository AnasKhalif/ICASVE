<?php

namespace App\Http\Controllers\Landing;

use App\Models\Instagram;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstagramController extends Controller
{
    public function index()
{
    $instagramLinks = Instagram::all(); // Menampilkan semua data tanpa filter tahun
    return view('landingpage-editor.instagram.index', compact('instagramLinks'));
}

    public function create()
    {
        $activeYear = LandingSetting::where('is_active', true)->value('year');
        return view('landingpage-editor.instagram.create', compact('activeYear'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'year' => 'required|integer',
        ]);

        Instagram::create([
            'link' => $request->link,
            'year' => $request->year,
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
            'year' => 'required|integer',
        ]);

        $instagram = Instagram::findOrFail($id);
        $instagram->update([
            'link' => $request->link,
            'year' => $request->year,
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
