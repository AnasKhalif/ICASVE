<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizingCommittee;

class OrganizingCommitteeController extends Controller
{
    public function index()
    {
        $committees = OrganizingCommittee::all();
        return view('landingpage-editor.organizing.index', compact('committees'));
    }

    public function create()
    {
        return view('landingpage-editor.organizing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
        ]);
        
        OrganizingCommittee::create($request->all());
        return redirect()->route('landing.organizing.index')->with('success', 'Committee member added!');
    }

    public function edit($id)
    {
        $committee = OrganizingCommittee::findOrFail($id);
        return view('landingpage-editor.organizing.edit', compact('committee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
        ]);
        
        $committee = OrganizingCommittee::findOrFail($id);
        $committee->update($request->all());
        
        return redirect()->route('landing.organizing.index')->with('success', 'Committee updated!');
    }

    public function destroy($id)
    {
        OrganizingCommittee::findOrFail($id)->delete();
        return redirect()->route('landing.organizing.index')->with('success', 'Committee deleted!');
    }
}
