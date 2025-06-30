<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Hotels extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('landingpage.information-hotel.index', compact('hotels'));
    }
}
