<?php
namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubmissionIndexController extends Controller
{
    public function index(){
        return view('landingpage-editor.submission.index');
    }
}