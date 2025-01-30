<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Symposium;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class SymposiumController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $symposiums = Symposium::withCount('abstracts')->paginate(10);
        return view('symposium.index', compact('symposiums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('symposium.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'abbreviation' => ['required', 'string', 'max:50']
        ]);

        Symposium::create($validatedData);

        return redirect()->route('admin.symposium.index')->with($this->alertCreated());
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
    public function edit($id)
    {
        try {
            $symposium = Symposium::findOrFail($id);
            return view('symposium.edit', compact('symposium'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.symposium.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $symposium = Symposium::findOrFail($id);

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'abbreviation' => ['required', 'string', 'max:50']
            ]);

            $symposium->update($validatedData);

            return redirect()->route('admin.symposium.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.symposium.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $symposium = Symposium::findOrFail($id);
            $symposium->delete();

            return redirect()->route('admin.symposium.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.symposium.index')->with($this->alertNotFound());
        }
    }
}
