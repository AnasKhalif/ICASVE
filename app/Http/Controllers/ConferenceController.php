<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index() {
        $timeline = [
            ['name' => 'Abstract Submission', 'date' => '15 August – 14 September 2024'],
            ['name' => 'Abstract Acceptance', 'date' => 'One day after submission'],
            ['name' => 'Payment Deadline', 'date' => '17 September 2024'],
            ['name' => 'Full Paper Submission', 'date' => '16 – 30 September 2024'],
            ['name' => 'Non-presenter Registration', 'date' => '15 October 2024'],
            ['name' => 'Conference Date', 'date' => '23 October 2024']
        ];

        return view('landing.pages.home', compact('timeline'));
    }
}
