<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\Symposium;
use App\Models\FullPaper;
use App\Models\Year;
use App\Traits\FlashAlert;

class OralController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }

        $symposiums = Symposium::with(['abstracts' => function ($query) {
            $query->where('presentation_type', 'Oral presentation');
        }])->whereYear('created_at', $activeYear->year)->get();

        return view('oral.index', compact('symposiums'));
    }

    public function edit($id)
    {
        $abstract = AbstractModel::findOrFail($id);
        $symposiums = Symposium::all();

        return view('oral.edit', compact('abstract', 'symposiums'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'symposium_id' => 'required|exists:symposiums,id',
        ]);

        $abstract = AbstractModel::findOrFail($id);
        $abstract->update([
            'symposium_id' => $request->symposium_id,
        ]);

        return redirect()->route('admin.oral.index')->with($this->alertUpdated());
    }
}
