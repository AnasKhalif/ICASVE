<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
class GalleryLandingPage extends Controller
{
    public function index(){
        $gallery = gallery::all();
        return view('landingpage.gallery.gallery', compact('gallery'));
    }
}
