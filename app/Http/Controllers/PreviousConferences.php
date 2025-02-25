<?php

namespace App\Http\Controllers;

use App\Models\AbstractModel;
use App\Http\Controllers\Controller;
use App\Models\Poster;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ConferenceSetting;

class PreviousConferences extends Controller
{
    public function index()
    {
        
        $posters = Poster::all();
        $conferenceSetting = ConferenceSetting::all();
        // $conferenceTitle = optional($conferenceSetting)->conference_title ?? 'The 3rd International Conference on Applied Science for Vocational Education';
        // $conferenceAbbreviation = optional($conferenceSetting)->conference_abbreviation ?? 'ICASVE2025';
        return view('landingpage.prevconference.previous_conference', compact('posters', 'conferenceSetting'));
    }

    public function downloadAllPdf()
    {

        $abstracts = AbstractModel::with('symposium')
            ->get();

        foreach ($abstracts as $abstract) {
            $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
            $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        }

        $pdf = PDF::loadView('abstract.all_pdf', compact('abstracts'));

        return $pdf->stream('all-abstracts.pdf');
    }

    private function formatAuthors($authors)
    {
        return preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $authors);
    }

    private function formatAffiliations($affiliations)
    {
        $formattedAffiliations = preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $affiliations);
        return nl2br($formattedAffiliations);
    }
}
