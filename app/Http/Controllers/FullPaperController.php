<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\AbstractModel;
use Illuminate\Support\Facades\Storage;
use App\Models\Year;
use App\Models\ConferenceSetting;
use App\Traits\FlashAlert;

class FullPaperController extends Controller
{
    use FlashAlert;

    public function create(Request $request)
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_full_paper_upload) {
            return redirect()->route('abstracts.index')->with($this->alertFullpaperClosed());
        }

        $abstractId = $request->input('abstract_id');
        $abstract = AbstractModel::findOrFail($abstractId);

        if ($abstract->fullPaper && !in_array($abstract->fullPaper->status, ['revision', 'open'])) {
            return back()->with($this->alertFullpaperNotEdit());
        }

        return view('fullpapers.create', compact('abstract'));
    }

    public function store(Request $request, $abstractId)
    {
        $conferenceSetting = ConferenceSetting::first();
        if (!$conferenceSetting || !$conferenceSetting->open_full_paper_upload) {
            return redirect()->route('abstracts.index')->with($this->alertFullpaperClosed());
        }

        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:10240',
        ]);

        $abstract = AbstractModel::findOrFail($abstractId);

        $fullPaper = FullPaper::where('abstract_id', $abstract->id)->first();

        if ($fullPaper) {
            if (!in_array($fullPaper->status, ['revision', 'open'])) {
                return back()->with($this->alertFullpaperNotEdit());
            }

            $uploadedPath = $request->file('file')->store('full_papers', 'public');

            if ($fullPaper->status === 'revision') {

                if ($fullPaper->revised_file_path) {
                    Storage::disk('public')->delete($fullPaper->revised_file_path);
                }

                $fullPaper->revised_file_path = $uploadedPath;
            } else {

                if ($fullPaper->file_path) {
                    Storage::disk('public')->delete($fullPaper->file_path);
                }

                $fullPaper->file_path = $uploadedPath;
            }

            $fullPaper->save();
        } else {
            FullPaper::create([
                'abstract_id' => $abstract->id,
                'file_path' => $request->file('file')->store('full_papers', 'public'),
                'status' => 'open',
            ]);
        }
        return redirect()->route('abstracts.index')->with($this->alertCreated());
    }
}
