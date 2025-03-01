<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::all();
        return view('years.index', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate(['year' => 'required|integer|unique:years,year']);
        Year::create(['year' => $request->year, 'is_active' => false]);
        return redirect()->back()->with('success', 'Tahun berhasil ditambahkan.');
    }

    public function setActive($id)
    {
        Year::query()->update(['is_active' => false]);
        Year::where('id', $id)->update(['is_active' => true]);
        return redirect()->back()->with('success', 'Tahun aktif diperbarui.');
    }
}
