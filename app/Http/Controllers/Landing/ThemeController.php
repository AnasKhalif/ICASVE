<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index(Request $request)
{
    $query = Theme::query();

    if ($request->has('year') && $request->year != '') {
        $query->where('year', $request->year);
    }

    $themes = $query->latest()->paginate(10);
    $years = Theme::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

    return view('landingpage-editor.themes.index', compact('themes', 'years'));
}

    public function create()
    {
        return view('landingpage-editor.themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'description' => 'required|string',
        ]);

        Theme::create($request->all());

        return redirect()->route('landing.themes.index')->with('success', 'Theme added successfully.');
    }

    public function edit(Theme $theme)
    {
        return view('landingpage-editor.themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'description' => 'required|string',
        ]);

        $theme->update($request->all());

        return redirect()->route('landing.themes.index')->with('success', 'Theme updated successfully.');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('landing.themes.index')->with('success', 'Theme deleted successfully.');
    }
}
