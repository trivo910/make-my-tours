<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/tempo-traveller-hire', function () {
    return view('pages.tempo-traveller-hire');
});

Route::get('/bus-hire', function () {
    return view('pages.bus-hire');
});

Route::get('/urbania', function () {
    return view('pages.urbania');
});

Route::get('/faqs', function () {
    return view('pages.faqs');
});
