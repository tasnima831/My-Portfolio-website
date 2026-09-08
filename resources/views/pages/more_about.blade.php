<!DOCTYPE html>
<html lang="en" class="more-about-page">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-white.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More About Me | Tasnima Akther Tisha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <main class="more-about">
        <a class="more-about__back" href="{{ url('/') }}#about"><span aria-hidden="true">&larr;</span> Back to Portfolio</a>
        <header class="more-about__intro">
            <p class="eyebrow">Beyond the code</p>
            <h1>More about me</h1>
            <p>I’m Tasnima Akther Tisha, a <strong>full-stack developer</strong> who builds practical and user-friendly web experiences.</p>
            <p>I also create educational <strong>YouTube content</strong>, where I share knowledge and promote my web projects. Beyond technology, <strong>debating</strong> helps me explore ideas and understand different perspectives.</p>
        </header>
        <section class="more-about__section" aria-labelledby="youtube-heading">
            <h2 id="youtube-heading">YouTube &amp; Content Creation</h2>
            <p>I use YouTube to market the websites and projects I build. I also create educational videos about programming languages, web development, and other technology-related topics to share my knowledge with others.</p>
            <a class="more-about__youtube-link" href="https://www.youtube.com/@tat7057" target="_blank" rel="noopener noreferrer">Visit my YouTube channel <span aria-hidden="true">&rarr;</span></a>
        </section>
        <section class="more-about__section" aria-labelledby="research-heading">
            <h2 id="research-heading">Research &amp; Thesis</h2>
            <p>I am currently working on my thesis, which focuses on classifying chest X-ray images using deep learning and transfer learning. Through this ongoing research, I am gaining experience in data preparation, model training, evaluation, and technical documentation.</p>
        </section>
        <section class="more-about__section" aria-labelledby="debating-heading">
            <h2 id="debating-heading">Debating</h2>
            <p>Debating helps me express ideas clearly and understand topics from different perspectives.</p>
        </section>
        <a class="more-about__back" href="{{ url('/') }}#about"><span aria-hidden="true">&larr;</span> Back to Portfolio</a>
    </main>
</body>
</html>
