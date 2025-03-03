<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConferenceSetting;
use App\Models\Year;
use App\Traits\FlashAlert;

class ConferenceSettingController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();
        

        if (!$activeYear) {
            return redirect()->back()->with($this->alertDanger());
        }

        $settings = ConferenceSetting::whereYear('created_at', $activeYear->year)->first();
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'conference_title' => 'required|string|max:255',
            'conference_abbreviation' => 'required|string|max:255',
            'conference_chairperson' => 'required|string|max:255',
            'administrator_email' => 'required|string|regex:/^([\w\.\-]+@[\w\.\-]+\.[\w]{2,},?)+$/',
            'treasurer_email' => 'required|string|regex:/^([\w\.\-]+@[\w\.\-]+\.[\w]{2,},?)+$/',
            'bank_account' => 'required|string',
            'max_abstracts_per_participant' => 'required|integer|min:0',
            'max_words_in_abstract_body' => 'required|integer|min:0',
            'attendance_format' => 'required|in:onsite,online,hybrid',
            'payment_instruction' => 'required',
        ]);

        $settings = ConferenceSetting::firstOrNew([]);
        $settings->fill($request->all());

        $settings->open_registration = $request->has('open_registration') ? 1 : 0;
        $settings->open_full_paper_upload = $request->has('open_full_paper_upload') ? 1 : 0;
        $settings->open_abstract_submission = $request->has('open_abstract_submission') ? 1 : 0;
        $settings->payment_instruction = $request->payment_instruction;

        $settings->save();

        return redirect()->route('admin.settings.index')->with($this->alertUpdated());
    }
}
