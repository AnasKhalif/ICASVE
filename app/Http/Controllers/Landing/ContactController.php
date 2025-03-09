<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showLandingpage()
    {
        $latestYear = Contact::max('created_at');
        $contacts = Contact::whereYear('created_at', date('Y', strtotime($latestYear)))->get();
    
        return view('landingpage.contact.contact', compact('contacts'));
    }
    public function index()
    {
        $contacts = Contact::all();
        return view('landingpage-editor.landingpage.contact.index', compact('contacts'));
    }
    public function create()
    {
        return view('landingpage-editor.landingpage.contact.create');
    }
    public function store(Request $request)
    {
        $request->validate([
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
        return view('landingpage-editor.landingpage.contact.edit', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
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

    public function sendEmail(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ];

    Mail::send('emails.contact', $details, function ($message) use ($details) {
        $message->to('admin@example.com') // Ganti dengan email tujuan
                ->subject('New Contact Message from ' . $details['name']);
    });

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}

}
