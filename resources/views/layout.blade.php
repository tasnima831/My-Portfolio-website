<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasnima Akther Tisha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('importants.header')

    @include('pages.hero_section')

    @include('pages.about')

    @include('pages.skills')

    @include('pages.education')

    @include('pages.feature')

    @include('pages.product')

    @include('pages.gallary')

    @yield('content')

    @include('importants.footer')
</body>
</html>
