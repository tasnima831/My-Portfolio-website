<?php

use Illuminate\Support\Facades\Route;

Route::view('/about-me', 'pages.more_about')->name('about.more');

Route::get('/', function () {
    return view('layout');
});
