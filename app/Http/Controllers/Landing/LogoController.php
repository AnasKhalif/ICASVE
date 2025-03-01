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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'year' => 'required|integer|min:2000|max:' . date('Y')
        ], [
            'image.required' => 'Gambar harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format yang diperbolehkan: PNG, JPEG, JPG.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'year.required' => 'Tahun harus diisi.',
            'year.integer' => 'Tahun harus berupa angka.',
            'year.min' => 'Tahun minimal 2000.',
            'year.max' => 'Tahun tidak boleh lebih dari tahun saat ini.',
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'year' => 'required|integer|min:2000|max:' . date('Y')
        ], [
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format yang diperbolehkan: PNG, JPEG, JPG.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'year.required' => 'Tahun harus diisi.',
            'year.integer' => 'Tahun harus berupa angka.',
            'year.min' => 'Tahun minimal 2000.',
            'year.max' => 'Tahun tidak boleh lebih dari tahun saat ini.',
        ]);

        
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($logo->image);
            $imagePath = $request->file('image')->store('logos', 'public');
            $logo->image = $imagePath;
        }

        
        $logo->year = $request->year;
        $logo->save();

        return redirect()->route('landing.logos.index')->with('success', 'Logo berhasil diperbarui!');
    }

    public function destroy(Logo $logo)
    {
        
        if ($logo->image) {
            Storage::disk('public')->delete($logo->image);
        }

        
        $logo->delete();

        return redirect()->route('landing.logos.index')->with('success', 'Logo berhasil dihapus!');
    }
}
