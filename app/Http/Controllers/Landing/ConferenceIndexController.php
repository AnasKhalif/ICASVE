<?php
namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConferenceIndexController extends Controller
{
    public function index(){
        return view('landingpage-editor.conference.index');
    }
}