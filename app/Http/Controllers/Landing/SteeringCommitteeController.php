<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SteeringCommittee;

class SteeringCommitteeController extends Controller
{
    public function index()
    {
        $committees = SteeringCommittee::all();
        return view('landingpage-editor.steering.index', compact('committees'));
    }

    public function create()
    {
        return view('landingpage-editor.steering.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'institution' => 'required|string|max:255',
    ]);

    SteeringCommittee::create($request->all());

    return redirect()->route('landing.steering.index')->with('success', 'Steering Committee added successfully.');
}


public function edit($id)
{
    $steering = SteeringCommittee::findOrFail($id);
    return view('landingpage-editor.steering.edit', compact('steering'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'institution' => 'required|string|max:255',
    ]);

    $steering = SteeringCommittee::findOrFail($id);
    $steering->update($request->all());

    return redirect()->route('landing.steering.index')->with('success', 'Steering Committee updated successfully.');
}


public function destroy(SteeringCommittee $steering)
{
    $steering->delete();
    return redirect()->route('landing.steering.index')->with('success', 'Steering Committee deleted successfully.');
}

}
