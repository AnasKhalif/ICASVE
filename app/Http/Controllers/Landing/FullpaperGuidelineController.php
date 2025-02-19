<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\FullpaperGuideline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FullpaperGuidelineController extends Controller {
    public function index() {
        $guidelines = FullpaperGuideline::orderBy('year', 'desc')->get();
        return view('landingpage-editor.fullpaper.index', compact('guidelines'));
    }

    public function create() {
        return view('landingpage-editor.fullpaper.create');
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $pdfPath = $request->file('pdf_file') ? $request->file('pdf_file')->store('landingpage-editor', 'public') : null;

        FullpaperGuideline::create([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.fullpaper-guidelines.index')->with('success', 'Guideline berhasil ditambahkan');
    }

    public function edit(FullpaperGuideline $fullpaperGuideline) {
        return view('landingpage-editor.fullpaper.edit', compact('fullpaperGuideline'));
    }

    public function update(Request $request, FullpaperGuideline $fullpaperGuideline) {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);
    
        // Jika ada file baru yang diunggah, hapus yang lama dan simpan yang baru
        if ($request->hasFile('pdf_file')) {
            if ($fullpaperGuideline->pdf_file) {
                Storage::delete($fullpaperGuideline->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('landingpage-editor','public');
        } else {
            $pdfPath = $fullpaperGuideline->pdf_file;
        }
    
        $fullpaperGuideline->update([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);
    
        return redirect()->route('landing.fullpaper-guidelines.index')->with('success', 'Guideline berhasil diperbarui');
    }
    

    public function destroy(FullpaperGuideline $fullpaperGuideline) {
        if ($fullpaperGuideline->pdf_file) {
            Storage::delete($fullpaperGuideline->pdf_file);
        }
        $fullpaperGuideline->delete();
        
        return redirect()->route('landing.fullpaper-guidelines.index')->with('success', 'Guideline berhasil dihapus');
    }
    
}
