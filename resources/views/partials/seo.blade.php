@php
    $name = 'Tasnima Akther Tisha';
    $base = rtrim(config('app.url'), '/');
    $canonical = $base . '/' . ltrim(request()->path(), '/');
    $title = $seoTitle ?? $name . ' | Full-Stack Developer';
    $description = $seoDescription ?? 'Explore Tasnima Akther Tisha’s full-stack development portfolio, featuring Laravel, PHP and JavaScript projects, skills, education and contact details.';
    $image = $base . '/images/me.png';
    $person = [
        '@type' => 'Person', '@id' => $base . '/#person', 'name' => $name,
        'url' => $base . '/', 'image' => $image, 'jobTitle' => 'Full-Stack Developer',
        'sameAs' => ['https://www.linkedin.com/in/tasnima-akther-tisha/', 'https://www.youtube.com/@tat7057'],
    ];
    $page = [
        '@type' => isset($seoProject) ? 'WebPage' : 'ProfilePage',
        '@id' => $canonical . '#webpage', 'url' => $canonical,
        'name' => $title, 'description' => $description,
        'isPartOf' => ['@id' => $base . '/#website'],
        'mainEntity' => ['@id' => $base . '/#person'],
    ];
    $graph = [$person, ['@type' => 'WebSite', '@id' => $base . '/#website', 'url' => $base . '/', 'name' => $name, 'publisher' => ['@id' => $base . '/#person']]];
    if (isset($seoProject)) {
        $page['mainEntity'] = ['@id' => $canonical . '#project'];
        $graph[] = ['@type' => 'CreativeWork', '@id' => $canonical . '#project', 'name' => $seoProject['title'], 'description' => $seoProject['description'], 'url' => $canonical];
        $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Portfolio', 'item' => $base . '/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => $seoProject['title'], 'item' => $canonical],
        ]];
    }
    $graph[] = $page;
    $structuredData = ['@context' => 'https://schema.org', '@graph' => $graph];
@endphp
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow, max-image-preview:large">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $name }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:alt" content="Portrait of {{ $name }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR) !!}</script>
