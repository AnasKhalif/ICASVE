<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class GalleryLandingPage extends Controller
{
    public function index()
    {
        $gallery = gallery::all();
        $years = gallery::select('year')->distinct()->orderBy('year', 'desc')->get();
        return view('landingpage.gallery.gallery', compact('gallery', 'years'));
    }
}
