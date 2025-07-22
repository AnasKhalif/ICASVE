<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        $participants = [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants',
        ];

        $reviewers = [
            'chief-editor',
            'editor',
            'reviewer'
        ];

        $landingEditor = [
            'landing-editor'
        ];

        if (in_array('admin', $roles)) {
            return redirect()->route('admin.summary');
        }

        if (array_intersect($roles, $reviewers)) {
            return redirect()->route('reviewer.summary');
        }

        if (array_intersect($roles, $landingEditor)) {
            return redirect()->route('landing.landingpage.index');
        }

        if (!array_intersect($roles, $participants)) {
            abort(403, 'Unauthorized');
        }

        $user = User::with([
            'abstracts.symposium',
            'abstracts.fullPaper.fullPaperReviews.reviewer',
            'filePayment',
            'certificates'
        ])->find(Auth::id());
        return view('dashboard', compact('user'));
    }
}
