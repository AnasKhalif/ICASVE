<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('landingpage-editor.landingpage.faq.index', compact('faqs'));
    }
    public function create()
    {
        return view('landingpage-editor.landingpage.faq.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['description'] = strip_tags($validatedData['description']);
        Faq::create($validatedData);
        return redirect()->route('landing.faq.index')->with('success', 'FAQ created successfully.');
    }
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('landingpage-editor.landingpage.faq.edit', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['description'] = strip_tags($validatedData['description']);
        $faq->update($validatedData);
        return redirect()->route('landing.faq.index')->with('success', 'FAQ updated successfully.');
    }
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('landing.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
