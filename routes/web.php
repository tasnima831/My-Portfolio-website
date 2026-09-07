<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact', ContactController::class)->middleware('throttle:5,1')->name('contact.send');

Route::view('/about-me', 'pages.more_about')->name('about.more');

Route::get('/projects/{slug}', function (string $slug) {
    $projects = collect(config('portfolio.projects', []));
    $project = $projects->firstWhere('slug', $slug);
    abort_unless($project, 404);

    return view('pages.project-detail', [
        'project' => $project,

    ]);
})->name('projects.show');

Route::get('/', function () {
    return view('layout');
});
