<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PaymentGuideline;
use Illuminate\Http\Request;

class PaymentGuidelineController extends Controller
{

    public function showLandingPage(){
        $guidelines = PaymentGuideline::orderBy('year', 'desc')->get();
        return view('landingpage.payment_guidelines.index', compact('guidelines'));
    }

    public function index(Request $request)
{
    $query = PaymentGuideline::orderBy('year', 'desc');

    if ($request->has('year') && $request->year) {
        $query->where('year', $request->year);
    }

    $guidelines = $query->get();
    $years = PaymentGuideline::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

    return view('landingpage-editor.payment_guidelines.index', compact('guidelines', 'years'));
}


    public function create()
    {
        return view('landingpage-editor.payment_guidelines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'year' => 'required|integer',
            'guideline' => 'required',
        ]);

        PaymentGuideline::create($request->all());
        return redirect()->route('landing.payment_guidelines.index')->with('success', 'Guideline berhasil ditambahkan.');
    }

    public function edit(PaymentGuideline $paymentGuideline)
    {
        return view('landingpage-editor.payment_guidelines.edit', compact('paymentGuideline'));
    }

    public function update(Request $request, PaymentGuideline $paymentGuideline)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'year' => 'required|integer',
            'guideline' => 'required',
        ]);

        $paymentGuideline->update($request->all());
        return redirect()->route('landing.payment_guidelines.index')->with('success', 'Guideline berhasil diperbarui.');
    }

    public function destroy(PaymentGuideline $paymentGuideline)
    {
        $paymentGuideline->delete();
        return redirect()->route('landing.payment_guidelines.index')->with('success', 'Guideline berhasil dihapus.');
    }
}
