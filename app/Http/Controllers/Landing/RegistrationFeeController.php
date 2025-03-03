<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrationFee;
use Illuminate\Validation\Rule;

class RegistrationFeeController extends Controller
{
    public function index()
    {
        $registrationFees = RegistrationFee::all();
        return view('landingpage-editor.landingpage.registrationFee.index', compact('registrationFees'));
    }
    public function create()
    {
        return view('landingpage-editor.landingpage.registrationFee.create');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'category_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/[a-zA-Z]/'],
        'domestic_participants' => ['nullable', 'string', 'regex:/^\d+$/'],
        'international_participants' => ['nullable', 'string', 'regex:/^\d+$/'],
        'period_of_payment' => ['nullable' ,'string'],
        'role_type' => ['required', Rule::in(['presenter', 'non_presenter', 'additional_fee'])],
    ], [
        'category_name.required' => 'Category name is required.',
        'category_name.min' => 'Category name must be at least 3 characters.',
        'category_name.regex' => 'Category name must contain at least one letter.',
        'period_of_payment.required' => 'Period of payment is required.',
        'role_type.required' => 'Role type is required.',
    ]);

    $validatedData['domestic_participants'] = $validatedData['domestic_participants'] ?? 'TBA';
    $validatedData['international_participants'] = $validatedData['international_participants'] ?? 'TBA';
    $validatedData['period_of_payment'] = $validatedData['period_of_payment'] ?? 'TBA';


    $validatedData['category_name'] = strip_tags($validatedData['category_name']);
    RegistrationFee::create($validatedData);

    return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee created successfully.');
}

    public function edit($id)
    {
        $registrationFee = RegistrationFee::findOrFail($id);
        return view('landingpage-editor.landingpage.registrationFee.edit', compact('registrationFee'));
    }
    public function update(Request $request, $id)
    {
        $registrationFee = RegistrationFee::findOrFail($id);
        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'domestic_participants' => ['nullable', 'string', 'regex:/^\d+$/'],
            'international_participants' => ['nullable', 'string', 'regex:/^\d+$/'],
            'period_of_payment' => ['nullable', 'string'],
            'role_type' => [Rule::in(['presenter', 'non_presenter', 'additional_fee'])],
        ]);

        $validatedData['category_name'] = strip_tags($validatedData['category_name']);
        $validatedData['domestic_participants'] = $validatedData['domestic_participants'] ?? 'TBA';
        $validatedData['international_participants'] = $validatedData['international_participants'] ?? 'TBA';
        $validatedData['period_of_payment'] = $validatedData['period_of_payment'] ?? 'TBA';

        $registrationFee->update($validatedData);
        return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee updated successfully.');
    }
    public function destroy($id)
    {
        $registrationFee = RegistrationFee::findOrFail($id);
        $registrationFee->delete();
        return redirect()->route('landing.registrationFee.index')->with('success', 'Registration Fee deleted successfully.');
    }
}
