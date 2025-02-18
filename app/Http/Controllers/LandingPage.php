<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\registrationFee;
use App\Models\publications_journal;

class LandingPage extends Controller
{
    public function index()
    {
        $keynoteSpeakers = Speaker::where('role', 'keynote_speaker')->get();
        $invitedSpeakers = Speaker::where('role', 'invited_speaker')->get();
        $presenter = registrationFee::where('role_type', 'presenter')->get();
        $non_presenter = registrationFee::where('role_type', 'non_presenter')->get();
        $additional_fee = registrationFee::where('role_type', 'additional_fee')->get();
        $publications_journal = publications_journal::where('image_type', 'publications_journal')->get();
        $hosted_by = publications_journal::where('image_type', 'hosted_by')->get();
        $co_hosted_by = publications_journal::where('image_type', 'co_hosted_by')->get();
        $supported_by = publications_journal::where('image_type', 'supported_by')->get();
        return view('landingpage.home', compact('keynoteSpeakers', 'invitedSpeakers', 'presenter', 'non_presenter', 'additional_fee', 'publications_journal', 'hosted_by', 'co_hosted_by', 'supported_by'));
    }
}
