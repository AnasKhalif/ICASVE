<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractModel;

class ArchiveController extends Controller
{
    public function index()
    {
        // Ambil tahun-tahun unik dari abstrak yang diterima
        $years = AbstractModel::where('status', 'accepted')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        // Ambil tahun terbaru untuk default tampilan
        $latestYear = $years->first();

        return view('landingpage.archives.index', compact('years', 'latestYear'));
    }

    public function show($year)
    {
        $years = AbstractModel::where('status', 'accepted')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');
    
        $abstracts = AbstractModel::whereYear('created_at', $year)
            ->where('status', 'accepted')
            ->get();
    
        if (request()->ajax()) {
            return view('landingpage.archives.show', compact('year', 'abstracts'))->render();
        }
    
        return view('landingpage.archives.index', compact('years', 'year', 'abstracts'));
    }
    
}
