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
use App\Models\LandingSetting;

class LandingPageController extends Controller
{
    public function index($year = null)
    {
        $activeYear = $year ? LandingSetting::where('year', $year)->first() : LandingSetting::where('is_active', true)->first();

        if (!$activeYear) {
            abort(404, 'Year not found');
        }
        $about = About::where('year', $activeYear->year)->latest('id')->first();

        $keynoteSpeakers = Speaker::where('role', 'keynote_speaker')
            ->where('year', $activeYear->year) 
            ->get();

        $invitedSpeakers = Speaker::where('role', 'invited_speaker')
            ->where('year', $activeYear->year)
            ->get();
        $posters = Poster::where('year', $activeYear->year)->get();
        $deadline_date = DeadlineDate::where('year', $activeYear->year)->get();
        $presenter = RegistrationFee::where('role_type', 'presenter')->where('year', $activeYear->year)->get();
        $non_presenter = RegistrationFee::where('role_type', 'non_presenter')->where('year', $activeYear->year)->get();
        $additional_fee = RegistrationFee::where('role_type', 'additional_fee')->where('year', $activeYear->year)->get();
        $publications_journal = PublicationsJournal::where('image_type', 'publications_journal')->where('year', $activeYear->year)->get();
        $hosted_by = PublicationsJournal::where('image_type', 'hosted_by')->where('year', $activeYear->year)->get();
        $co_hosted_by = PublicationsJournal::where('image_type', 'co_hosted_by')->where('year', $activeYear->year)->get();
        $supported_by = PublicationsJournal::where('image_type', 'supported_by')->where('year', $activeYear->year)->get();
        $venues = Venue::where('year', $activeYear->year)->get();
      
        $contacts = Contact::where('year', $activeYear->year)->get();

        $themes = Theme::where('year', $activeYear->year)->orderBy('year', 'desc')->get();
        $faqs = Faq::whereYear('created_at', $activeYear->year)->limit(3)->get();
        $conference_title = ConferenceTitle::where('year', $activeYear->year)->orderByDesc('year')->first();

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
            'conference_title',
            'activeYear'
        ));
    }


    public function showTheme($id)
    {
        $theme = Theme::findOrFail($id);
        return view('landingpage.theme_detail.index', compact('theme'));
    }
}
