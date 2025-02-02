<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Data dari SpeakerController
        $speakers = [
            ['name' => 'Prof. Ramayah T', 'university' => 'Universiti Sains Malaysia', 'country' => 'Malaysia', 'image' => 'ProfRamayah.jpg'],
            ['name' => 'Xiao Qin, Ph.D', 'university' => 'Shanghai University', 'country' => 'China', 'image' => 'XiaoQin.jpg'],
            ['name' => 'Prof. Eko Ganis Sukoharsono, Ph.D', 'university' => 'Universitas Brawijaya', 'country' => 'Indonesia', 'image' => 'ProfEkoGanis.jpg'],
            ['name' => 'H.E. Dr. Taleb Rifai', 'university' => 'Former Secretary General of UNWTO', 'country' => 'Jordan', 'image' => 'TalebRifai.jpg'],
            ['name' => 'Prof. Muhammad Ashfaq', 'university' => 'IU International University', 'country' => 'Germany', 'image' => 'ProfMuhammadAshfaq.jpg'],
            ['name' => 'Miratul Khusna Mufida, Ph.D', 'university' => 'Politeknik Negeri Batam', 'country' => 'Indonesia', 'image' => 'mira.jpg'],
        ];

        // Data dari ConferenceController
        $timeline = [
            ['name' => 'Abstract Submission', 'date' => '15 August – 14 September 2024'],
            ['name' => 'Abstract Acceptance', 'date' => 'One day after submission'],
            ['name' => 'Payment Deadline', 'date' => '17 September 2024'],
            ['name' => 'Full Paper Submission', 'date' => '16 – 30 September 2024'],
            ['name' => 'Non-presenter Registration', 'date' => '15 October 2024'],
            ['name' => 'Conference Date', 'date' => '23 October 2024'],
        ];

        return view('landing.pages.home', compact('speakers', 'timeline'));
    }
}
