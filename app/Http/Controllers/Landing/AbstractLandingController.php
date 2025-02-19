<?php
namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractLanding;

class AbstractLandingController extends Controller
{
    public function index()
    {
        $abstractLanding = AbstractLanding::latest()->first();
        return view('landingpage-editor.abstractlanding.index', compact('abstractLanding'));
    }

    public function create()
    {
        return view('landingpage-editor.abstractlanding.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'guideline' => 'required',
        ]);
    
        $abstractLanding = AbstractLanding::create([
            'guideline' => $request->guideline,
            'last_updated' => now(),
        ]);
    
        return redirect()->route('landing.abstractlanding.edit', $abstractLanding->id)->with('success', 'Guideline added successfully.');
    }
    
    public function edit($id)
{
    $abstractLanding = AbstractLanding::find($id);

    if (!$abstractLanding) {
        return redirect()->route('landing.abstractlanding.index')->with('error', 'Data tidak ditemukan.');
    }

    return view('landingpage-editor.abstractlanding.edit', compact('abstractLanding'));
}



    public function update(Request $request, AbstractLanding $abstractLanding)
    {
        $request->validate([
            'guideline' => 'required',
        ]);

        $abstractLanding->update([
            'guideline' => $request->guideline,
            'last_updated' => now(),
        ]);

        return redirect()->route('landing.abstractlanding.index')->with('success', 'Guideline updated successfully.');
    }

    public function destroy(AbstractLanding $abstractLanding)
    {
        $abstractLanding->delete();
        return redirect()->route('landing.abstractlanding.index')->with('success', 'Guideline deleted successfully.');
    }

    public function uploadTemplate(Request $request, AbstractLanding $abstractLanding)
    {
        $request->validate([
            'template' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time().'_'.$request->file('template')->getClientOriginalName();
        $request->file('template')->storeAs('public/templates', $fileName);

        $abstractLanding->update([
            'pdf_template' => $fileName,
            'last_updated' => now(),
        ]);

        return back()->with('success', 'Template uploaded successfully.');
    }
}
