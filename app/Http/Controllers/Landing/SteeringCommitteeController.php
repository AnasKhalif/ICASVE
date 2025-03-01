<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SteeringCommittee;


class SteeringCommitteeController extends Controller
{
    public function index(Request $request)
    {
        $years = SteeringCommittee::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $selectedYear = $request->year ?? 'all';

        $committees = ($selectedYear === 'all')
            ? SteeringCommittee::all()
            : SteeringCommittee::where('year', $selectedYear)->get();

        return view('landingpage-editor.steering.index', compact('committees', 'years', 'selectedYear'));
    }


    public function create()
    {
        return view('landingpage-editor.steering.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
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
            'institution' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $steering = SteeringCommittee::findOrFail($id);
        $steering->update($request->all());

        return redirect()->route('landing.steering.index')->with('success', 'Steering Committee updated successfully.');
    }

    public function destroy($id)
    {
        $steering = SteeringCommittee::findOrFail($id);
        $steering->delete();

        return redirect()->route('landing.steering.index')->with('success', 'Steering Committee deleted successfully.');
    }
}
