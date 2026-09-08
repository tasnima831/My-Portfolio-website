<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/sitemap.xml', function () {
    $base = rtrim(config('app.url'), '/');
    $urls = [$base . '/', $base . '/about-me'];
    foreach (config('portfolio.projects', []) as $project) {
        $urls[] = $base . '/projects/' . rawurlencode($project['slug']);
    }
    return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/robots.txt', function () {
    return response("User-agent: *\nDisallow:\n\nSitemap: " . rtrim(config('app.url'), '/') . "/sitemap.xml\n")
        ->header('Content-Type', 'text/plain; charset=UTF-8');
});

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
