<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact', ContactController::class)->middleware('throttle:5,1')->name('contact.send');

Route::view('/about-me', 'pages.more_about')->name('about.more');

Route::get('/', function () {
    return view('layout');
});
