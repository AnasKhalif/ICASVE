<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SteeringCommittee;
use Illuminate\Http\Request;

class steeringLandingPage extends Controller
{
    public function index(){
        $steeringCommittee = SteeringCommittee::all();
        return view('landingpage.committee.steering', compact('steeringCommittee'));
    }
}

