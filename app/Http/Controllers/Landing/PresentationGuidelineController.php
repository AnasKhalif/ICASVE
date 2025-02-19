<?php
namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PresentationGuideline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresentationGuidelineController extends Controller {
    public function index() {
        $guidelines = PresentationGuideline::orderBy('year', 'desc')->get();
        return view('landingpage-editor.presentation.index', compact('guidelines'));
    }

    public function create() {
        return view('landingpage-editor.presentation.create');
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $pdfPath = $request->file('pdf_file') ? $request->file('pdf_file')->store('landingpage-editor','public') : null;

        PresentationGuideline::create([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.presentation-guidelines.index')->with('success', 'Guideline berhasil ditambahkan');
    }

    public function edit(PresentationGuideline $presentationGuideline) {
        return view('landingpage-editor.presentation.edit', compact('presentationGuideline'));
    }

    public function update(Request $request, PresentationGuideline $presentationGuideline) {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($presentationGuideline->pdf_file) {
                Storage::delete($presentationGuideline->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('landingpage-editor','public');
        } else {
            $pdfPath = $presentationGuideline->pdf_file;
        }

        $presentationGuideline->update([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.presentation-guidelines.index')->with('success', 'Guideline berhasil diperbarui');
    }

    public function destroy(PresentationGuideline $presentationGuideline) {
        if ($presentationGuideline->pdf_file) {
            Storage::delete($presentationGuideline->pdf_file);
        }
        $presentationGuideline->delete();

        return redirect()->route('landing.presentation-guidelines.index')->with('success', 'Guideline berhasil dihapus');
    }
}
