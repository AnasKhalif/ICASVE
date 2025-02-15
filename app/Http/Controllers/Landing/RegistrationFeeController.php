<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrationFee;
use Illuminate\Validation\Rule;

class RegistrationFeeController extends Controller
{
    public function index() {
        $registrationFees = RegistrationFee::all();
        return view('landingpage-editor.registrationFee.index', compact('registrationFees'));
    }

    public function create() {
        return view('landingpage-editor.registrationFee.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'domestic_participants' => ['required', 'numeric', 'min:0', 'regex:/^\d+$/'],
            'international_participants' => ['required', 'numeric', 'min:0', 'regex:/^\d+$/'],
            'period_of_payment' => ['required', 'date', 'after_or_equal:today'],
            'role_type' => ['required', Rule::in(['presenter', 'non_presenter', 'additional_fee'])],
        ]);

        $validatedData['category_name'] = strip_tags($validatedData['category_name']);

        RegistrationFee::create($validatedData);

        return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee created successfully.');
    }

    public function edit($id){
        $registrationFee = RegistrationFee::findOrFail($id);
        return view('landingpage-editor.registrationFee.edit', compact('registrationFee'));
    }

    public function update(Request $request, $id) {
        $registrationFee = RegistrationFee::findOrFail($id);

        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'domestic_participants' => ['required', 'numeric', 'min:0', 'regex:/^\d+$/'],
            'international_participants' => ['required', 'numeric', 'min:0', 'regex:/^\d+$/'],
            'period_of_payment' => ['required', 'date', 'after_or_equal:today'],
            'role_type' => ['required', Rule::in(['presenter', 'non_presenter', 'additional_fee'])],
        ]);

        $validatedData['category_name'] = strip_tags($validatedData['category_name']);

        $registrationFee->update($validatedData);

        return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee updated successfully.');
    }

    public function destroy($id) {
        $registrationFee = RegistrationFee::findOrFail($id);
        $registrationFee->delete();
        return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee deleted successfully.');
    }
}
