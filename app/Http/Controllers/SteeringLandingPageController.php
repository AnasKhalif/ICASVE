<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SteeringCommittee;

class SteeringLandingPageController extends Controller
{
    public function index()
    {
        $steeringCommittee = SteeringCommittee::all();
        return view('landingpage.committee.steering', compact('steeringCommittee'));
    }
}
