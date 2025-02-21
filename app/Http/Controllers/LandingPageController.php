<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\RegistrationFee;
use App\Models\PublicationsJournal;
use App\Models\Venue;

class LandingPageController extends Controller
{
    public function index()
    {
        $keynoteSpeakers = Speaker::where('role', 'keynote_speaker')->get();
        $invitedSpeakers = Speaker::where('role', 'invited_speaker')->get();
        $presenter = RegistrationFee::where('role_type', 'presenter')->get();
        $non_presenter = RegistrationFee::where('role_type', 'non_presenter')->get();
        $additional_fee = RegistrationFee::where('role_type', 'additional_fee')->get();
        $publications_journal = PublicationsJournal::where('image_type', 'publications_journal')->get();
        $hosted_by = PublicationsJournal::where('image_type', 'hosted_by')->get();
        $co_hosted_by = PublicationsJournal::where('image_type', 'co_hosted_by')->get();
        $supported_by = PublicationsJournal::where('image_type', 'supported_by')->get();
        $venues = Venue::all();
        return view('landingpage.home', compact('keynoteSpeakers', 'invitedSpeakers', 'presenter', 'non_presenter', 'additional_fee', 'publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by', 'venues'));
    }
}
