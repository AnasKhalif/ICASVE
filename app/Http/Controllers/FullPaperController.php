<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\AbstractModel;

class FullPaperController extends Controller
{
    public function create($abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);
        return view('fullpapers.create', compact('abstract'));
    }

    public function store(Request $request, $abstractId)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:10240',
        ]);

        $abstract = AbstractModel::findOrFail($abstractId);

        $filePath = $request->file('file')->store('full_papers', 'public');

        FullPaper::create([
            'abstract_id' => $abstract->id,
            'file_path' => $filePath,
            'status' => 'open',
        ]);

        return redirect()->route('abstracts.index')->with('success', 'Full paper has been uploaded successfully.');
    }
}