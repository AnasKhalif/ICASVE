<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\Symposium;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FullPaper;

class AbstractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abstracts = AbstractModel::with(['symposium', 'fullPaper'])
            ->where('user_id', Auth::id())
            ->paginate(10);
        return view('abstracts.index', compact('abstracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $symposiums = Symposium::all();
        return view('abstracts.create', compact('symposiums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'affiliations' => 'required',
            'corresponding_email' => 'required|email',
            'abstract' => 'required',
            'presentation_type' => 'required|in:Oral presentation,Poster presentation',
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        AbstractModel::create([
            'user_id' => Auth::id(),
            'symposium_id' => $request->symposium_id,
            'title' => $request->title,
            'authors' => $request->authors,
            'affiliations' => $request->affiliations,
            'corresponding_email' => $request->corresponding_email,
            'abstract' => $request->abstract,
            'presentation_type' => $request->presentation_type,
            'status' => 'open',
        ]);

        return redirect()->route('abstracts.index')->with('success', 'Abstract submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbstractModel $abstract)
    {
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        return view('abstracts.detail', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbstractModel $abstract)
    {
        if ($abstract->status != 'open') {
            return back()->with('error', 'Cannot edit abstract in review process');
        }

        $symposiums = Symposium::all();
        return view('abstracts.edit', compact('abstract', 'symposiums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbstractModel $abstract)
    {
        if ($abstract->status != 'open') {
            return back()->with('error', 'Cannot edit abstract in review process');
        }

        $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'affiliations' => 'required',
            'corresponding_email' => 'required|email',
            'abstract' => 'required',
            'presentation_type' => 'required|in:Oral presentation,Poster presentation',
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        $abstract->update($request->only([
            'title', 'authors', 'affiliations', 'corresponding_email', 'abstract', 'presentation_type', 'symposium_id'
        ]));

        return redirect()->route('abstracts.index')->with('success', 'Abstract updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbstractModel $abstract)
    {
        if ($abstract->status != 'open') {
            return back()->with('error', 'Cannot delete abstract in review process');
        }

        $abstract->delete();
        return redirect()->route('abstracts.index')->with('success', 'Abstract deleted successfully');
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

    public function downloadPdf($id)
    {
        $abstract = AbstractModel::with('symposium')->findOrFail($id);
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);

        $pdf = PDF::loadView('abstracts.pdf', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));

        return $pdf->stream('abstract-detail.pdf');
    }
}
