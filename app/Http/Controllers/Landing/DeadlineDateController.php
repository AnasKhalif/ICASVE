<?php
namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\DeadlineDate;
use Illuminate\Http\Request;

class DeadlineDateController extends Controller
{
    public function index()
    {
        $deadlines = DeadlineDate::all();
        return view('landingpage-editor.deadline-dates.index', compact('deadlines'));
    }

    public function create()
    {
        return view('landingpage-editor.deadline-dates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        DeadlineDate::create($request->all());

        return redirect()->route('landing.deadline-dates.index')->with('success', 'Deadline created successfully.');
    }

    public function edit(DeadlineDate $deadline)
    {
        $deadlines = DeadlineDate::all();
        return view('landingpage-editor.deadline-dates.edit', compact('deadline'));
    }

    public function update(Request $request, DeadlineDate $deadline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $deadline->update($request->all());

        return redirect()->route('landing.deadline-dates.index')->with('success', 'Deadline updated successfully.');
    }

    public function destroy(DeadlineDate $deadline)
    {
        $deadline->delete();
        return redirect()->route('landing.deadline-dates.index')->with('success', 'Deadline deleted successfully.');
    }
}
