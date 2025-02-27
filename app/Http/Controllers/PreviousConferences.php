<?php

namespace App\Http\Controllers;

use App\Models\AbstractModel;
use App\Models\Poster;
use App\Models\ConferenceSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PreviousConferences extends Controller
{
    public function index()
    {
        $posters = Poster::all();
        $conferenceSetting = ConferenceSetting::all();

        // We'll pass the selected year from the view to filter abstracts
        $selectedYear = request()->get('year', now()->year);  // Default to current year if not selected

        // Fetch abstracts by the selected year
        $abstracts = AbstractModel::whereHas('symposium', function($query) use ($selectedYear) {
            $query->whereYear('created_at', $selectedYear);
        })->get();

        // Pass data to the view
        return view('landingpage.prevconference.previous_conference', compact('posters', 'conferenceSetting', 'abstracts', 'selectedYear'));
    }

    public function downloadAllPdf(Request $request)
           {
               // Get the selected year from the request, defaulting to the current year
               $selectedYear = $request->get('year', now()->year);
           
               // Filter abstracts by the year of the symposium
               $abstracts = AbstractModel::whereHas('symposium', function($query) use ($selectedYear) {
                   $query->whereYear('created_at', $selectedYear); // Assuming 'created_at' is the field to filter by year
               })->with('symposium')->get();
           
               // Format authors and affiliations
               foreach ($abstracts as $abstract) {
                   $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
                   $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
               }
           
               // Generate the PDF
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
