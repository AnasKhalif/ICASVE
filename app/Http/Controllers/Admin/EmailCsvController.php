<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmailCsvController extends Controller
{
    public function index()
    {
        $roles = ['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'];

        $emails = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->pluck('email')->toArray();

        $emailCsv = implode(',', $emails);

        return view('email_csv.index', compact('emailCsv'));
    }
}
