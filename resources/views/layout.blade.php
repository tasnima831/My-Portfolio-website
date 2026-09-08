<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-white.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasnima Akther Tisha</title>
    <script>
        document.documentElement.classList.add('is-loading');
        window.setTimeout(() => document.documentElement.classList.remove('is-loading'), 8000);
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('importants.preloader')
    @include('importants.header')

    @include('pages.hero_section')

    @include('pages.about')

    @include('pages.skills')

    @include('pages.education')

    @include('pages.services')

    @include('pages.projects')

    @include('pages.contact')

    @yield('content')

    @include('importants.footer')
</body>
</html>
