<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-white.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.seo', ['seoTitle' => $project['title'] . ' | Tasnima Akther Tisha', 'seoDescription' => $project['description'], 'seoProject' => $project])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="project-detail-page">
    <main class="project-detail">
        <a href="{{ url('/') }}#projects">&larr; Back to projects</a>
        @include('partials.project-content')
    </main>
</body>
</html>

