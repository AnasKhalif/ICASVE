<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\Symposium;
use Illuminate\Support\Facades\Auth;
use App\Models\FullPaper;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FilePayment;
use App\Models\Year;
use App\Models\SteeringCommittee;
use App\Models\OrganizingCommittee;
use App\Models\ReviewerCommittee;
use App\Models\Speaker;
use App\Traits\FlashAlert;

class AbstractsController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->query('search');

        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }

        $abstracts = AbstractModel::with(['symposium', 'fullPaper', 'filePayment'])
            ->whereYear('created_at', $activeYear->year)
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->paginate(10);


        $oralTotal = AbstractModel::where('presentation_type', 'Oral Presentation')
            ->where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $oralPaid = AbstractModel::where('presentation_type', 'Oral Presentation')
            ->where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->whereHas('filePayment', function ($query) {
                $query->where('status', 'verified');
            })
            ->count();

        $posterTotal = AbstractModel::where('presentation_type', 'Poster')
            ->where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $posterPaid = AbstractModel::where('presentation_type', 'Poster')
            ->where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->whereHas('filePayment', function ($query) {
                $query->where('status', 'verified');
            })
            ->count();

        if ($request->ajax()) {
            return response()->json([
                'abstracts' => $abstracts->items(),
                'pagination' => (string) $abstracts->links(),
            ]);
        }

        return view('abstract.index', compact('abstracts', 'oralTotal', 'oralPaid', 'posterTotal', 'posterPaid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbstractModel $abstract)
    {
        $symposiums = Symposium::all();
        return view('abstract.edit', compact('abstract', 'symposiums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbstractModel $abstract)
    {
        $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'affiliations' => 'required',
            'corresponding_email' => 'required|email',
            'abstract' => 'required',
            'presentation_type' => 'required|in:Oral presentation,Poster presentation',
            'publication' => 'required|in:Journal Publication,International Indexed Proceedings',
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        $abstract->update($request->only([
            'title', 'authors', 'affiliations', 'corresponding_email', 'abstract', 'presentation_type', 'symposium_id'
        ]));

        return redirect()->route('admin.abstract.index')->with($this->alertUpdated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbstractModel $abstract)
    {
        $abstract->delete();
        return redirect()->route('admin.abstract.index')->with($this->alertDeleted());
    }

    public function showBySymposium()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }

        $symposiums = Symposium::with('abstracts')
            ->whereYear('created_at', $activeYear->year)
            ->get();

        foreach ($symposiums as $symposium) {
            foreach ($symposium->abstracts as $abstract) {
                $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
                $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
            }
        }

        return view('abstract.by_symposium', compact('symposiums'));
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

    public function downloadAllPdf()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'No active year set.');
        }

        $abstracts = AbstractModel::with('symposium')
            ->whereYear('created_at', $activeYear->year)
            ->get();

        foreach ($abstracts as $abstract) {
            $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
            $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        }

        $pdf = PDF::loadView('abstract.all_pdf', compact('abstracts'));

        return $pdf->stream('all-abstracts.pdf');
    }

    public function downloadVerifiedPdf()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with('error', 'No active year set.');
        }

        $steeringCommittee = SteeringCommittee::where('year', $activeYear->year)->get();
        if ($steeringCommittee->isEmpty()) {
            return back()->with('error', 'Steering Committee for the active year is not set.');
        }

        $organizingCommittee = OrganizingCommittee::where('year', $activeYear->year)->get();
        if ($organizingCommittee->isEmpty()) {
            return back()->with('error', 'Organizing Committee for the active year is not set.');
        }

        $reviewerCommittee = ReviewerCommittee::where('year', $activeYear->year)->get();
        if ($reviewerCommittee->isEmpty()) {
            return back()->with('error', 'Reviewer Committee for the active year is not set.');
        }

       $speakers = Speaker::where('year', $activeYear->year)->get();

        if ($speakers->isEmpty()) {
            return back()->with('error', 'Speakers for the active year is not set.');
        }
        
        $keynoteSpeakers = $speakers->where('role', 'keynote_speaker');
        $invitedSpeakers = $speakers->where('role', 'invited_speaker');

        $abstracts = AbstractModel::with('symposium')
            ->where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->whereHas('user.filePayment', function ($query) {
                $query->where('status', 'verified');
            })
            ->get();

        foreach ($abstracts as $abstract) {
            $abstract->formattedAuthors = $this->formatAuthors($abstract->authors);
            $abstract->formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        }

        $pdf = PDF::loadView('abstract.verified_pdf', compact('abstracts', 'steeringCommittee', 'organizingCommittee', 'reviewerCommittee', 'keynoteSpeakers', 'invitedSpeakers'));

        return $pdf->stream('verified-abstracts.pdf');
    }
}
