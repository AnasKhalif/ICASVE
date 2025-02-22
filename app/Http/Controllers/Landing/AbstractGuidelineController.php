<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractGuideline;
use Illuminate\Support\Facades\Storage;

class AbstractGuidelineController extends Controller
{
    public function showLandingPage()
{
    $guidelines = AbstractGuideline::orderBy('year', 'desc')->get(); // Ambil semua guidelines
    return view('landingpage.submission.abstract', compact('guidelines'));
}

    public function index()
    {
        $guidelines = AbstractGuideline::orderBy('year', 'desc')->get();
        return view('landingpage-editor.abstract.index', compact('guidelines'));
    }

    public function create()
    {
        return view('landingpage-editor.abstract.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $pdfPath = $request->file('pdf_file') ? $request->file('pdf_file')->store('landingpage-editor', 'public') : null;

        AbstractGuideline::create([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.abstract-guidelines.index')->with('success', 'Abstract Guideline berhasil ditambahkan');
    }

    public function edit(AbstractGuideline $abstractGuideline)
    {
        return view('landingpage-editor.abstract.edit', compact('abstractGuideline'));
    }

    public function update(Request $request, AbstractGuideline $abstractGuideline)
    {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($abstractGuideline->pdf_file) {
                Storage::delete($abstractGuideline->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('landingpage-editor', 'public');
        } else {
            $pdfPath = $abstractGuideline->pdf_file;
        }

        $abstractGuideline->update([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.abstract-guidelines.index')->with('success', 'Abstract Guideline berhasil diperbarui');
    }

    public function destroy(AbstractGuideline $abstractGuideline)
    {
        if ($abstractGuideline->pdf_file) {
            Storage::delete($abstractGuideline->pdf_file);
        }
        $abstractGuideline->delete();

        return redirect()->route('landing.abstract-guidelines.index')->with('success', 'Abstract Guideline berhasil dihapus');
    }
}
