<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Data dari KeynotesController
        $keynotes  = [
            ['name' => 'Tatang Muttaqin, S.Sos., M.Ed., Ph.D', 'university' => 'Plt. Direktur Jenderal Pendidikan Vokasi Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi
', 'country' => 'Malaysia', 'image' => 'tatangMutakin.jpg'],
        ];

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
            ['name' => 'Abstract Submission Deadline  ', 'date' => 'July 2, 2024'],
            ['name' => 'Abstract Notification', 'date' => 'July 3, 2024'],
            ['name' => 'Participant (non speaker) Registration Deadline', 'date' => 'July 10, 2024'],
            ['name' => 'Payment Deadline', 'date' => 'July 10, 2024'],
            ['name' => 'Full Paper Deadline', 'date' => 'July 12, 2024'],
            ['name' => 'Conference Date', 'date' => 'July 17, 2024'],
        ];

        // Data dari PublicationController
        $publicationJurnal = [
            ['name' => 'Logo 1', 'src' => 'images/logo/logo-8.png'],
            ['name' => 'Logo 2', 'src' => 'images/logo/logo-2.png'],
            ['name' => 'Logo 3', 'src' => 'images/logo/logo-3.jpg'],
            ['name' => 'Logo 4', 'src' => 'images/logo/logo-4.png'],
            ['name' => 'Logo 5', 'src' => 'images/logo/logo-5.png'],
            ['name' => 'Logo 6', 'src' => 'images/logo/logo-6.jpeg'],
        ];

        return view('landing.pages.home', compact('keynotes', 'speakers', 'timeline', 'publicationJurnal'));
    }
}
