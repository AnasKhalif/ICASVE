<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingSetting;
use App\Traits\FlashAlert;

class SettingController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $years = LandingSetting::all();
        return view('landingpage-editor.setting.index', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate(['year' => 'required|integer|unique:landing_settings,year']);
        LandingSetting::create(['year' => $request->year, 'is_active' => false]);
        return redirect()->back()->with($this->alertCreated());
    }

    public function setActive($id)
    {
        LandingSetting::query()->update(['is_active' => false]);
        LandingSetting::where('id', $id)->update(['is_active' => true]);
        return redirect()->back()->with($this->alertUpdated());
    }
}
