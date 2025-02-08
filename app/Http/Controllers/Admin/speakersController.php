<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\speakers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; 

class SpeakersController extends Controller
{
    public function index()
    {
        $speakers = speakers::all();
        return view('leadingpage.speakers.index', compact('speakers'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['admin'])->get();
        return view('leadingpage.speakers.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'image' => ['required', 'file', 'image', 'max:2048'],
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $userId = Auth::id(); 
    
        speakers::create([
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'institution' => $validatedData['institution'],
            'image' => $validatedData['image'],
            'user_id' => $userId, 
        ]);
    
        return redirect()->route('admin.speakers.index')->with('success', 'Speaker created successfully.');
    }
    

    public function edit($id)
    {
        $speaker = speakers::findOrFail($id);
        $roles = Role::whereIn('name', ['admin'])->get();
        return view('leadingpage.speakers.edit', compact('speaker', 'roles'));
    }

    public function update(Request $request, $id)
   {
    $speaker = speakers::findOrFail($id);
    
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'role' => ['required', 'string', 'max:255'],
        'institution' => ['required', 'string', 'max:255'],
        'image' => ['nullable', 'file', 'image', 'max:2048'],
    ]);

    if ($request->hasFile('image')) {
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }

        // Simpan gambar baru di storage/public/speakers
        $imagePath = $request->file('image')->store('speakers', 'public');
        $validatedData['image'] = $imagePath;
    } else {
        $validatedData['image'] = $speaker->image;
    }

    $speaker->update($validatedData);

    return redirect()->route('admin.speakers.index')->with('success', 'Speaker updated successfully.');
 }

    

  public function destroy($id)
  {
    $speaker = speakers::findOrFail($id);

    if ($speaker->image) {
        Storage::disk('public')->delete($speaker->image);
    }

    $speaker->delete();

    return redirect()->route('admin.speakers.index')->with('success', 'Speaker deleted successfully.');
  }

}
