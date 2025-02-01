<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        // Data dummy untuk pembicara
        $speakers = [
            [
                'name' => 'Prof. Ramayah T',
                'university' => 'Universiti Sains Malaysia',
                'country' => 'Malaysia',
                'image' => 'ProfRamayah.jpg'
            ],
            [
                'name' => 'Xiao Qin, Ph.D',
                'university' => 'Shanghai University',
                'country' => 'China',
                'image' => 'XiaoQin.jpg'
            ],
            [
                'name' => 'Prof. Eko Ganis Sukoharsono, Ph.D',
                'university' => 'Universitas Brawijaya',
                'country' => 'Indonesia',
                'image' => 'ProfEkoGanis.jpg'
            ],
            [
                'name' => 'H.E. Dr. Taleb Rifai',
                'university' => 'Former Secretary General of UNWTO',
                'country' => 'Jordan',
                'image' => 'TalebRifai.jpg'
            ],
            [
                'name' => 'Prof. Muhammad Ashfaq',
                'university' => 'IU International University',
                'country' => 'Germany',
                'image' => 'ProfMuhammadAshfaq.jpg'
            ],
            [
                'name' => 'Miratul Khusna Mufida, Ph.D',
                'university' => 'Politeknik Negeri Batam',
                'country' => 'Indonesia',
                'image' => 'mira.jpg'
            ],
        ];

        // Mengirim data ke view
        return view('landing.pages.home', compact('speakers'));
    }
}
