<?php

namespace App\Http\Controllers;

use App\Models\AbstractModel;
use App\Models\Poster;
use App\Models\ConferenceTitle;
use App\Models\Speaker;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PreviousConferences extends Controller
{
    public function index()
    {

        $speakers = Speaker::all();
        $posters = Poster::all();
        $conferenceTitle = ConferenceTitle::all(); 
        $theme = ConferenceTitle::query()->where('year', now()->year)->first();
        $selectedYear = request()->get('year', now()->year);
        Log::info('Selected Year: ' . $selectedYear);
        $abstracts = AbstractModel::whereYear('created_at', $selectedYear)->get();
        Log::info('Abstracts: ', $abstracts->toArray());
    
        return view('landingpage.prevconference.previous_conference', compact('posters', 'conferenceTitle', 'abstracts', 'selectedYear', 'theme', 'speakers'));
    }

    public function downloadAllPdf(Request $request)
    {
        $selectedYear = $request->get('year', now()->year);
        $abstracts = AbstractModel::whereYear('created_at', $selectedYear)->get();
        foreach ($abstracts as $abstract) {
            $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
            $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        }

        $pdf = PDF::loadView('abstract.all_pdf', compact('abstracts', 'selectedYear'));
        
        return $pdf->stream('all-abstracts-' . $selectedYear . '.pdf');
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


