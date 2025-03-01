<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SteeringCommittee;

class SteeringLandingPageController extends Controller
{
    public function index(Request $request)
    {
        $years = SteeringCommittee::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

        $selectedYear = $request->year ?? $years->first();

        $steeringCommittee = SteeringCommittee::where('year', $selectedYear)->get();

        return view('landingpage.committee.steering', compact('steeringCommittee', 'years', 'selectedYear'));
    }
}
