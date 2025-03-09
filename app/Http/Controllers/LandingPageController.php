<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\RegistrationFee;
use App\Models\PublicationsJournal;
use App\Models\Venue;
use App\Models\DeadlineDate;
use App\Models\About;
use App\Models\Poster;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Theme;
use App\Models\ConferenceTitle;
use App\Models\Year;

class LandingPageController extends Controller
{
    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();
        $keynoteSpeakers = Speaker::where('role', 'keynote_speaker')->whereYear('created_at', $activeYear->year)->get();
        $invitedSpeakers = Speaker::where('role', 'invited_speaker')->whereYear('created_at', $activeYear->year)->get();
        $presenter = RegistrationFee::where('role_type', 'presenter')->whereYear('created_at', $activeYear->year)->get();
        $non_presenter = RegistrationFee::where('role_type', 'non_presenter')->whereYear('created_at', $activeYear->year)->get();
        $additional_fee = RegistrationFee::where('role_type', 'additional_fee')->whereYear('created_at', $activeYear->year)->get();
        $publications_journal = PublicationsJournal::where('image_type', 'publications_journal')->whereYear('created_at', $activeYear->year)->get();
        $hosted_by = PublicationsJournal::where('image_type', 'hosted_by')->whereYear('created_at', $activeYear->year)->get();
        $co_hosted_by = PublicationsJournal::where('image_type', 'co_hosted_by')->whereYear('created_at', $activeYear->year)->get();
        $supported_by = PublicationsJournal::where('image_type', 'supported_by')->whereYear('created_at', $activeYear->year)->get();
        $venues = Venue::whereYear('created_at', $activeYear->year)->get();
        $deadline_date = DeadlineDate::whereYear('created_at', $activeYear->year)->get();
        $contacts = Contact::whereYear('created_at', $activeYear->year)->get();
        $posters = Poster::where('year', $activeYear->year)->get();
        $themes = Theme::where('year', $activeYear->year)->orderBy('year', 'desc')->get();
        $faqs = Faq::whereYear('created_at', $activeYear->year)->limit(3)->get();

        $conference_title = ConferenceTitle::where('year', $activeYear->year)->orderByDesc('year')->first();

        $about = About::whereYear('created_at', $activeYear->year)->latest('id')->first();

        return view('landingpage.home', compact(
            'keynoteSpeakers',
            'invitedSpeakers',
            'presenter',
            'non_presenter',
            'additional_fee',
            'publications_journal',
            'hosted_by',
            'co_hosted_by',
            'supported_by',
            'venues',
            'deadline_date',
            'contacts',
            'posters',
            'about',
            'themes',
            'faqs',
            'conference_title'
        ));
    }

    public function showTheme($id)
    {
        $theme = Theme::findOrFail($id);
        return view('landingpage.theme_detail.index', compact('theme'));
    }
}
