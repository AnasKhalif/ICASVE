<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\AbstractModel;
use App\Models\Year;
use App\Models\ConferenceSetting;

class FullPaperController extends Controller
{
    public function create(Request $request)
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_full_paper_upload) {
            return redirect()->route('abstracts.index')->with('error', 'Abstract Submission Closed.');
        }

        $abstractId = $request->input('abstract_id');
        $abstract = AbstractModel::findOrFail($abstractId);

        if ($abstract->fullPaper && !in_array($abstract->fullPaper->status, ['revision', 'open'])) {
            return back()->with('error', 'You can only upload a full paper if it is in revision or open status.');
        }

        return view('fullpapers.create', compact('abstract'));
    }

    public function store(Request $request, $abstractId)
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_full_paper_upload) {
            return redirect()->route('abstracts.index')->with('error', 'Abstract Submission Closed.');
        }

        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:10240',
        ]);

        $abstract = AbstractModel::findOrFail($abstractId);

        $fullPaper = FullPaper::where('abstract_id', $abstract->id)->first();

        if ($fullPaper) {
            if (!in_array($fullPaper->status, ['revision', 'open'])) {
                return back()->with('error', 'You can only upload a full paper if it is in revision or open status.');
            }

            $previousStatus = $fullPaper->status;

            \Storage::disk('public')->delete($fullPaper->file_path);

            $fullPaper->update([
                'file_path' => $request->file('file')->store('full_papers', 'public'),
                'status' => $previousStatus,
            ]);
        } else {
            FullPaper::create([
                'abstract_id' => $abstract->id,
                'file_path' => $request->file('file')->store('full_papers', 'public'),
                'status' => 'open',
            ]);
        }

        return redirect()->route('abstracts.index')->with('success', 'Full paper has been uploaded successfully.');
    }
}
