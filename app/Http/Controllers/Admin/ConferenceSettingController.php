<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConferenceSetting;

class ConferenceSettingController extends Controller
{
    public function index()
    {
        $settings = ConferenceSetting::first();
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
        ]);

        $settings = ConferenceSetting::firstOrNew([]);
        $settings->fill($request->all());

        $settings->open_registration = $request->has('open_registration') ? 1 : 0;
        $settings->open_full_paper_upload = $request->has('open_full_paper_upload') ? 1 : 0;
        $settings->open_abstract_submission = $request->has('open_abstract_submission') ? 1 : 0;

        $settings->save();

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
