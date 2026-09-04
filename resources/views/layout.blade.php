<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasnima Akther Tisha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('importants.header')

    @include('pages.hero_section')

    @include('pages.about')

    @include('pages.feature')

    @include('pages.product')

    @include('pages.gallary')

    @yield('content')

    @include('importants.footer')
</body>
</html>
