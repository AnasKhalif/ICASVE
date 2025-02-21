<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicationsJournal;
use Illuminate\Validation\Rule;

class PublicationsJournalController extends Controller
{
    public function index()
    {
        $publications_journals = PublicationsJournal::all();
        return view('landingpage-editor.publications-journal.index', compact('publications_journals'));
    }
    public function create()
    {
        return view('landingpage-editor.publications-journal.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_type' => ['required', Rule::in(['publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by'])],
            'image_path' => ['required', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'],
        ]);
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('publications_journals', 'public');
            $validatedData['image_path'] = $imagePath;
        }
        PublicationsJournal::create($validatedData);
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publication created successfully.');
    }
    public function edit(PublicationsJournal $publications_journal)
    {
        return view('landingpage-editor.publications-journal.edit', compact('publications_journal'));
    }
    public function update(Request $request, PublicationsJournal $publications_journal)
    {
        $validatedData = $request->validate([
            'image_type' => ['required', Rule::in(['publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by'])],
            'image_path' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpeg,png,jpg,svg'],
        ]);
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('publications_journals', 'public');
            $validatedData['image_path'] = $imagePath;
        }
        $publications_journal->update($validatedData);
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publication updated successfully.');
    }
    public function destroy(PublicationsJournal $publications_journal)
    {
        $publications_journal->delete();
        return redirect()->route('landing.publications-journal.index')->with('success', 'Publication deleted successfully.');
    }
}
