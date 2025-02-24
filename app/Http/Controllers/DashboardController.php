<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::with([
            'abstracts.symposium',
            'abstracts.fullPaper.fullPaperReviews.reviewer',
            'filePayment',
            'certificates'
        ])->find(Auth::id());
        return view('dashboard', compact('user'));
    }
}
