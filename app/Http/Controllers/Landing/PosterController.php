<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;
use App\Models\Year;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::latest()->get(); 
        return view('landingpage-editor.landingpage.poster.index', compact('posters'));
    }


    public function create()
    {
        return view('landingpage-editor.landingpage.poster.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'link' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('posters', 'public');

        Poster::create([
            'image' => $imagePath,
            'year' => $request->year,
            'link' => $request->link ?? null, // Menghindari NULL yang tidak eksplisit
        ]);

        return redirect()->route('landing.poster.index')->with('success', 'Poster berhasil ditambahkan.');
    }

    public function edit(Poster $poster)
    {
        return view('landingpage-editor.landingpage.poster.edit', compact('poster'));
    }

    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($poster->image && Storage::exists('public/' . $poster->image)) {
                Storage::delete('public/' . $poster->image);
            }

            // Simpan gambar baru
            $poster->image = $request->file('image')->store('posters', 'public');
        }

        $poster->year = $request->year;
        $poster->link = $request->link ?? null;
        $poster->save();

        return redirect()->route('landing.poster.index')->with('success', 'Poster berhasil diperbarui.');
    }

    public function destroy(Poster $poster)
    {
        if ($poster->image && Storage::exists('public/' . $poster->image)) {
            Storage::delete('public/' . $poster->image);
        }

        $poster->delete();

        return redirect()->route('landing.poster.index')->with('success', 'Poster berhasil dihapus.');
    }
}
