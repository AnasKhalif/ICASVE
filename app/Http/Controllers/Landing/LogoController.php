<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::orderBy('year', 'desc')->get();
        return view('landingpage-editor.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('landingpage-editor.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'year' => 'required|integer'
        ]);

        $imagePath = $request->file('image')->store('logos', 'public');

        Logo::create([
            'image' => $imagePath,
            'year' => $request->year
        ]);

        return redirect()->route('landing.logos.index')->with('success', 'Logo berhasil ditambahkan!');
    }

    public function edit(Logo $logo)
    {
        return view('landingpage-editor.logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'year' => 'required|integer'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($logo->image);
            $imagePath = $request->file('image')->store('logos', 'public');
            $logo->update(['image' => $imagePath]);
        }

        $logo->update(['year' => $request->year]);

        return redirect()->route('landing.logos.index')->with('success', 'Logo berhasil diperbarui!');
    }

    public function destroy(Logo $logo)
    {
        Storage::disk('public')->delete($logo->image);
        $logo->delete();

        return redirect()->route('landing.logos.index')->with('success', 'Logo berhasil dihapus!');
    }
}
