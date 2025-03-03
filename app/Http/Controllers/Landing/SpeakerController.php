<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return view('landingpage-editor.landingpage.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('landingpage-editor.landingpage.speakers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'role' => ['required', 'string', 'min:3', 'max:255'],
            'institution' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'country' => ['required', 'string', 'min:3', 'max:255']
        ], [
            'name.required' => 'Nama speaker wajib diisi.',
            'name.min' => 'Nama speaker minimal 3 karakter.',
            'name.max' => 'Nama speaker tidak boleh lebih dari 255 karakter.',
            'role.required' => 'Peran speaker wajib diisi.',
            'role.min' => 'Peran speaker minimal 3 karakter.',
            'role.max' => 'Peran speaker tidak boleh lebih dari 255 karakter.',
            'institution.required' => 'Institusi wajib diisi.',
            'institution.min' => 'Institusi minimal 3 karakter.',
            'institution.max' => 'Institusi tidak boleh lebih dari 255 karakter.',
            'image.required' => 'Gambar speaker wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'country.required' => 'Negara wajib diisi.',
            'country.min' => 'Negara minimal 3 karakter.',
            'country.max' => 'Negara tidak boleh lebih dari 255 karakter.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        }

        Speaker::create($validatedData);

        return redirect()->route('landing.speakers.index')->with('success', 'Speaker berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('landingpage-editor.landingpage.speakers.edit', compact('speaker'));
    }

    public function update(Request $request, $id)
    {
        $speaker = Speaker::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'role' => ['required', 'string', 'min:3', 'max:255'],
            'institution' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'country' => ['required', 'string', 'min:3', 'max:255']
        ], [
            'name.required' => 'Nama speaker wajib diisi.',
            'name.min' => 'Nama speaker minimal 3 karakter.',
            'name.max' => 'Nama speaker tidak boleh lebih dari 255 karakter.',
            'role.required' => 'Peran speaker wajib diisi.',
            'role.min' => 'Peran speaker minimal 3 karakter.',
            'role.max' => 'Peran speaker tidak boleh lebih dari 255 karakter.',
            'institution.required' => 'Institusi wajib diisi.',
            'institution.min' => 'Institusi minimal 3 karakter.',
            'institution.max' => 'Institusi tidak boleh lebih dari 255 karakter.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'country.required' => 'Negara wajib diisi.',
            'country.min' => 'Negara minimal 3 karakter.',
            'country.max' => 'Negara tidak boleh lebih dari 255 karakter.',
        ]);

        if ($request->hasFile('image')) {
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }

            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        } else {
            $validatedData['image'] = $speaker->image;
        }

        $speaker->update($validatedData);

        return redirect()->route('landing.speakers.index')->with('success', 'Speaker berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();
        return redirect()->route('landing.speakers.index')->with('success', 'Speaker berhasil dihapus.');
    }
}
