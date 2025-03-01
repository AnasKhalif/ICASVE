<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('landingpage-editor.contact.index', compact('contacts'));
    }
    public function create()
    {
        return view('landingpage-editor.contact.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
        ]);
        Contact::create($request->all());
        return redirect()->route('landing.contact.index')->with('success', 'Contact added successfully!');
    }
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('landingpage-editor.contact.edit', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
        ]);
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('landing.contact.index')->with('success', 'Contact updated successfully!');
    }
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('landing.contact.index')->with('success', 'Contact deleted successfully!');
    }
}
