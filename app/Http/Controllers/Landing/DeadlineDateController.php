<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeadlineDate;
use App\Models\Year;

class DeadlineDateController extends Controller
{
    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'Tidak ada tahun aktif yang ditemukan.');
        }

        $deadlines = DeadlineDate::whereYear('date', $activeYear->year)->orderBy('date')->get();
        return view('landingpage-editor.landingpage.deadlinedates.index', compact('deadlines'));
    }

    public function create()
    {
        return view('landingpage-editor.landingpage.deadlinedates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        DeadlineDate::create($request->all());

        return redirect()->route('landing.deadlines.index')->with('success', 'Deadline added successfully.');
    }

    public function edit(DeadlineDate $deadline)
    {
        return view('landingpage-editor.landingpage.deadlinedates.edit', compact('deadline'));
    }

    public function update(Request $request, DeadlineDate $deadline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $deadline->update($request->all());

        return redirect()->route('landing.deadlines.index')->with('success', 'Deadline updated successfully.');
    }

    public function destroy(DeadlineDate $deadline)
    {
        $deadline->delete();
        return redirect()->route('landing.deadlines.index')->with('success', 'Deadline deleted successfully.');
    }
}
