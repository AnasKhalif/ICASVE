<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EthicsStatement;
use App\Models\LandingSetting;
use Illuminate\Support\Facades\Storage;

class EthicsStatementController extends Controller
{
    public function showLandingPage(Request $request)
    {
        $activeYear = LandingSetting::where('is_active', true)->value('year');
        $years = LandingSetting::orderBy('year', 'desc')->pluck('year');
        $selectedYear = $request->query('year', $activeYear ?? ($years->isNotEmpty() ? $years->first() : date('Y')));

        $ethics = EthicsStatement::where('year', $selectedYear)->first();

        return view('landingpage.submission.ethics', compact('ethics', 'years', 'selectedYear'));
    }

    public function index()
    {
        $ethics = EthicsStatement::orderBy('year', 'desc')->get();
        return view('landingpage-editor.submission.ethics.index', compact('ethics'));
    }

    public function create()
    {
        return view('landingpage-editor.submission.ethics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $pdfPath = $request->file('pdf_file') ? $request->file('pdf_file')->store('landingpage-editor', 'public') : null;

        EthicsStatement::create([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.ethics-statements.index')->with('success', 'Ethics and Malpractice Statement berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ethicsStatement = EthicsStatement::findOrFail($id);
        return view('landingpage-editor.submission.ethics.edit', compact('ethicsStatement'));
    }


    public function update(Request $request, EthicsStatement $ethicsStatement)
    {
        $request->validate([
            'year' => 'required|integer',
            'content' => 'required',
            'pdf_file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($ethicsStatement->pdf_file) {
                Storage::delete($ethicsStatement->pdf_file);
            }
            $pdfPath = $request->file('pdf_file')->store('landingpage-editor', 'public');
        } else {
            $pdfPath = $ethicsStatement->pdf_file;
        }

        $ethicsStatement->update([
            'year' => $request->year,
            'content' => $request->content,
            'pdf_file' => $pdfPath
        ]);

        return redirect()->route('landing.ethics-statements.index')->with('success', 'Ethics and Malpractice Statement berhasil diperbarui');
    }

    public function destroy(EthicsStatement $ethicsStatement)
    {
        if ($ethicsStatement->pdf_file) {
            Storage::delete($ethicsStatement->pdf_file);
        }
        $ethicsStatement->delete();

        return redirect()->route('landing.ethics-statements.index')->with('success', 'Ethics and Malpractice Statement berhasil dihapus');
    }
}
