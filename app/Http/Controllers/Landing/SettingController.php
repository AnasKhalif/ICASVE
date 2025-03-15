<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;

class SettingController extends Controller
{
    public function index()
    {
        $years = Year::orderBy('year', 'desc')->get();
        $activeYear = Year::where('is_active', true)->first();

        return view('landingpage-editor.setting.index', compact('years', 'activeYear'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'year' => 'required|exists:years,year',
        ]);

        // Reset semua tahun menjadi tidak aktif
        Year::query()->update(['is_active' => false]);

        // Set tahun yang dipilih menjadi aktif
        Year::where('year', $request->year)->update(['is_active' => true]);

        return redirect()->route('landing.setting.index')->with('success', 'Tahun aktif berhasil diperbarui!');
    }
}
