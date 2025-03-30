<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicationsJournal;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PublicationsJournalController extends Controller
{
    public function index(Request $request)
{
    // Mengambil daftar tahun berdasarkan data yang tersedia di tabel
    $years = PublicationsJournal::select('year')->distinct()->orderByDesc('year')->pluck('year');

    // Mengambil daftar image_type yang unik
    $imageTypes = PublicationsJournal::select('image_type')->distinct()->pluck('image_type');

    // Query dasar
    $query = PublicationsJournal::query();

    // Filter berdasarkan tahun (menggunakan kolom `year`, bukan `created_at`)
    if (!empty($request->year)) {
        $query->where('year', $request->year);
    }

    // Filter berdasarkan image type
    if (!empty($request->image_type)) {
        $query->where('image_type', $request->image_type);
    }

    // Menampilkan 10 item per halaman dengan paginasi
    $publications_journals = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('landingpage-editor.landingpage.publications-journal.index', compact('publications_journals', 'years', 'imageTypes'));
}

    
    
    public function create()
    {
        return view('landingpage-editor.landingpage.publications-journal.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_type' => ['required', Rule::in(['publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by'])],
            'image_path.*' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'], // Validasi multiple file
            'year' => ['required', 'integer', 'min:2024', 'max:' . Carbon::now()->year],
        ], [
            'image_path.*.mimes' => 'Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.',
            'year.min' => 'Tahun minimal adalah 2024.',
            'year.max' => 'Tahun tidak boleh lebih dari tahun sekarang.',
        ]);
    
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $file) {
                $imagePath = $file->store('publications_journals', 'public');
                PublicationsJournal::create([
                    'image_type' => $request->image_type,
                    'image_path' => $imagePath,
                    'year' => $request->year,
                ]);
            }
        }
    
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publications created successfully.');
    }

    public function edit(PublicationsJournal $publications_journal)
    {
        return view('landingpage-editor.landingpage.publications-journal.edit', compact('publications_journal'));
    }

    public function update(Request $request, PublicationsJournal $publications_journal)
    {
        $validatedData = $request->validate([
            'image_type' => ['required', Rule::in(['publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by'])],
            'image_path.*' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            'year' => ['required', 'integer', 'min:2024', 'max:' . Carbon::now()->year],
        ], [
            'image_path.*.mimes' => 'Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.',
            'year.min' => 'Tahun minimal adalah 2024.',
            'year.max' => 'Tahun tidak boleh lebih dari tahun sekarang.',
        ]);
    
        // Mengecek apakah ada file baru
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('storage/' . $publications_journal->image_path))) {
                unlink(public_path('storage/' . $publications_journal->image_path));
            }
    
            // Menyimpan gambar baru
            $imagePath = $request->file('image_path')->store('publications_journals', 'public');
            
            // Perbarui entri dengan gambar baru
            $publications_journal->update([
                'image_type' => $request->image_type,
                'image_path' => $imagePath,
                'year' => $request->year,
            ]);
        } else {
            // Jika tidak ada file baru, cukup perbarui data lain
            $publications_journal->update([
                'image_type' => $request->image_type,
                'year' => $request->year,
            ]);
        }
    
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publication updated successfully.');
    }
    
    

    public function destroy(PublicationsJournal $publications_journal)
    {
        $publications_journal->delete();
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publication deleted successfully.');
    }
}
