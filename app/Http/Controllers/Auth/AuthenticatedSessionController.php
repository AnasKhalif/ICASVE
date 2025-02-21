<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\ConferenceSetting;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $conferenceSetting = ConferenceSetting::first();
        $conferenceTitle = optional($conferenceSetting)->conference_title ?? 'The 3rd International Conference on Applied Science for Vocational Education';
        $conferenceAbbreviation = optional($conferenceSetting)->conference_abbreviation ?? 'ICASVE2025';
        return view('auth.login', compact('conferenceTitle', 'conferenceAbbreviation'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        $users = [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants',
        ];

        if (array_intersect($roles, $users)) {
            return redirect()->route('dashboard');
        }

        $reviewer = [
            'chief-editor',
            'editor',
            'reviewer'
        ];

        if (array_intersect($roles, $reviewer)) {
            return redirect()->route('reviewer.summary');
        }

        $landingEditor = [
            'landing-editor'
        ];

        if (array_intersect($roles, $landingEditor)) {
            return redirect()->route('landing.landingpage.index');
        }

        return redirect()->intended(route('admin.summary', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
