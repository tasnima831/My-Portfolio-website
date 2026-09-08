<main>
    <section class="hero hero--editorial" id="home">
        <div class="hero-copy">
            <h1>Tasnima Akther Tisha</h1>
            <p class="hero-intro">I am a dedicated full-stack developer who builds seamless, end-to-end web applications with clean design and solid code.</p>
            <div class="hero-actions">
                <a class="hero-resume-button" href="{{ asset('images/Tasnima Akther.pdf') }}" download="Tasnima Akther.pdf">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v12m-5-5 5 5 5-5M4 16v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4"/></svg>
                    Download Resume
                </a>
                <a class="hero-work-button" href="#projects">View My Work</a>
            </div>
        <nav class="social-orbit" aria-label="Social media">
            <div class="social-orbit__ring">
                <a class="social-orbit__link" href="https://www.facebook.com/tisha.akther.730554" target="_blank" rel="noopener noreferrer" aria-label="Facebook (opens in a new tab)" title="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14 22v-9h3l.5-4H14V7c0-1.2.4-2 2-2h2V1.4A25 25 0 0 0 15 1c-3 0-5 1.8-5 5v3H7v4h3v9z"/></svg>
                </a>
                <a class="social-orbit__link" href="https://www.instagram.com/tishaakther_/" target="_blank" rel="noopener noreferrer" aria-label="Instagram (opens in a new tab)" title="Instagram">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                </a>
                <a class="social-orbit__link" href="https://www.linkedin.com/in/tasnima-akther-tisha/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn (opens in a new tab)" title="LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="5" cy="5" r="2"/><path d="M3 9h4v12H3zm6 0h4v1.6C14 9.2 15.2 9 16.5 9 20 9 21 11.2 21 14v7h-4v-6.3c0-1.6-.3-2.7-1.9-2.7-1.7 0-2.1 1.2-2.1 2.7V21H9z"/></svg>
                </a>
                <a class="social-orbit__link" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=shraboniakter554%40gmail.com" target="_blank" rel="noopener noreferrer" aria-label="Email shraboniakter554@gmail.com via Gmail (opens in a new tab)" title="Email shraboniakter554@gmail.com via Gmail">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m3 6 9 7 9-7M6 20V9m12 11V9"/></svg>
                </a>
                <a class="social-orbit__link" href="https://www.youtube.com/@tat7057" target="_blank" rel="noopener noreferrer" aria-label="YouTube (opens in a new tab)" title="YouTube">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="4"/><path d="m10 9 5 3-5 3z" fill="currentColor" stroke="none"/></svg>
                </a>
            </div>
        </nav>
        </div>

        <div class="hero-visual">
        <figure class="hero-portrait" aria-label="Portrait of Tasnima Akther Tisha">
            <img src="{{ asset('images/me.png') }}" alt="Portrait of Tasnima Akther Tisha">
        </figure>
        </div>
        @include('pages.skills_marquee')
    </section>
</main>
