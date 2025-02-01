<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        // Data dummy untuk speakers
        $speakers = [
            [
                'name' => 'Prof. Ramayah T',
                'university' => 'Universiti Sains Malaysia',
                'country' => 'Malaysia',
                'image' => 'profile1.jpg'
            ],
            [
                'name' => 'H.E. Dr. Taleb Rifai',
                'university' => 'Former Secretary General of UNWTO',
                'country' => 'Jordan',
                'image' => 'profile2.jpg'
            ],
            [
                'name' => 'Xiao Qin, Ph.D',
                'university' => 'Shanghai University',
                'country' => 'China',
                'image' => 'profile3.jpg'
            ],
            [
                'name' => 'Prof. Muhammad Ashfaq',
                'university' => 'IU International University',
                'country' => 'Germany',
                'image' => 'profile4.jpg'
            ],
            [
                'name' => 'Prof. Eko Ganis Sukoharsono, Ph.D',
                'university' => 'Universitas Brawijaya',
                'country' => 'Indonesia',
                'image' => 'profile5.jpg'
            ],
            [
                'name' => 'Miratul Khusna Mufida, Ph.D',
                'university' => 'Politeknik Negeri Batam',
                'country' => 'Indonesia',
                'image' => 'profile6.jpg'
            ],
        ];

        // Mengirim data ke view
        return view('speakers.index', compact('speakers'));
    }
}
