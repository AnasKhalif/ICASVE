<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\Symposium;
use Illuminate\Support\Facades\Auth;
use App\Models\FullPaper;

class AbstractsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abstracts = AbstractModel::with(['symposium', 'fullPaper'])->paginate(10);
        return view('abstract.index', compact('abstracts'));
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
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        $abstract->update($request->only([
            'title', 'authors', 'affiliations', 'corresponding_email', 'abstract', 'presentation_type', 'symposium_id'
        ]));

        return redirect()->route('admin.abstract.index')->with('success', 'Abstract updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbstractModel $abstract)
    {
        $abstract->delete();
        return redirect()->route('admin.abstract.index')->with('success', 'Abstract deleted successfully');
    }
}
