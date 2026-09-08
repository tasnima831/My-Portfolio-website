const motionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');

if (!motionPreference.matches && 'IntersectionObserver' in window && Element.prototype.animate) {
    // Animate content, leaving transforms used by menus and interactive folders intact.
    const targets = [...document.querySelectorAll([
        '.hero-copy > h1', '.hero-intro', '.hero-actions', '.social-orbit', '.hero-visual',
        '.about-copy > :not(br)', '.about-layout > :not(.about-copy)',
        '.skills-section-inner > h2', '.skills-group__header', '.skill-card',
        '.journey-headings', '.journey-row', '.services-heading', '.service-folder',
        '.projects-heading', '.project-archive', '.contact-copy > *', '.contact-form',
        '.site-footer',
    ].join(','))];
    const running = new Map();
    let stopped = false;

    const reveal = (element, delay = 0) => {
        if (!element.classList.contains('reveal-pending')) return;
        element.classList.remove('reveal-pending');
        observer.unobserve(element);
        if (stopped || element.contains(document.activeElement)) return;
        const animation = element.animate([
            { opacity: 0, translate: '0 22px' },
            { opacity: 1, translate: '0 0' },
        ], { duration: 650, delay, easing: 'cubic-bezier(.22, 1, .36, 1)', fill: 'backwards' });
        running.set(element, animation);
        animation.onfinish = animation.oncancel = () => running.delete(element);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.filter((entry) => entry.isIntersecting).forEach((entry, index) => {
            reveal(entry.target, Math.min(index * 65, 260));
        });
    }, { threshold: 0, rootMargin: '0px 0px -24px 0px' });

    targets.forEach((element) => element.classList.add('reveal-pending'));
    document.documentElement.classList.add('motion-ready');

    const start = () => {
        if (document.documentElement.classList.contains('is-loading')) return;
        loadingObserver.disconnect();
        if (!stopped) targets.forEach((element) => observer.observe(element));
    };
    // Also catches the preloader's safety timeout, so content cannot stay hidden.
    const loadingObserver = new MutationObserver(start);
    loadingObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    start();

    document.addEventListener('focusin', (event) => {
        targets.filter((element) => element.contains(event.target)).forEach((element) => {
            reveal(element);
            running.get(element)?.cancel();
        });
    });

    const stop = () => {
        stopped = true;
        observer.disconnect();
        loadingObserver.disconnect();
        document.documentElement.classList.remove('motion-ready');
        targets.forEach((element) => element.classList.remove('reveal-pending'));
        running.forEach((animation) => animation.cancel());
    };
    motionPreference.addEventListener('change', (event) => { if (event.matches) stop(); });
    window.addEventListener('pageshow', (event) => { if (event.persisted) stop(); });
}
