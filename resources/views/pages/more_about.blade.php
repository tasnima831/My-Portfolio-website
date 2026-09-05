<!DOCTYPE html>
<html lang="en" class="more-about-page">
<head>
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
            <p>I'm Tasnima Akther Tisha. Building websites is one part of what I do; debating is another way I explore ideas and connect with different perspectives.</p>
            <p>Outside development, I enjoy the exchange of ideas that a debate creates. There is room to speak, but also room to listen, question an assumption, and look at a familiar topic from another angle.</p>
            <p class="more-about__emphasis">A little more about the person behind the portfolio.</p>
        </header>
        <section class="more-about__section" aria-labelledby="debating-heading">
            <h2 id="debating-heading">Debating</h2>
            <p>Debating gives me a space to put thoughts into words. I enjoy exploring a point of view, thinking through the reasons behind it, and finding a clear way to communicate it.</p>
            <p>The conversation matters as much as the argument. Hearing another perspective makes room for questions I might not have considered on my own.</p>
        </section>
        <section class="more-about__section" aria-labelledby="perspectives-heading">
            <h2 id="perspectives-heading">Listening &amp; Perspectives</h2>
            <p>What I value about debating is the balance between expressing an idea and giving someone else's idea careful attention. Clear communication starts with understanding what is being said, not just planning what to say next.</p>
            <p>That interest in thoughtful discussion is part of who I am beyond my technical work. This space shares that side of my story alongside the projects in my portfolio.</p>
        </section>
        <a class="more-about__back" href="{{ url('/') }}#about"><span aria-hidden="true">&larr;</span> Back to Portfolio</a>
    </main>
</body>
</html>
