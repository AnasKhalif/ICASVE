<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('landing.pages.home');
});


