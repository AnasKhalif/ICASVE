<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractModel;

class ArchiveController extends Controller
{
    public function index(Request $request)
{
    // Ambil daftar tahun unik dari abstrak yang diterima
    $years = AbstractModel::where('status', 'accepted')
        ->selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->orderByDesc('year')
        ->pluck('year');

    // Ambil tahun terbaru atau yang dipilih
    $selectedYear = $request->query('year', $years->first());

    // Ambil daftar abstrak dengan data yang lebih lengkap
    $abstracts = AbstractModel::whereYear('created_at', $selectedYear)
        ->where('status', 'accepted')
        ->orderBy('title', 'asc')
        ->get();

    return view('landingpage.archives.index', compact('years', 'selectedYear', 'abstracts'));
}

}
