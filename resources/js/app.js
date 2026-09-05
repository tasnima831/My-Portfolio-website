import './bootstrap';

// Keep server-rendered totals available without JavaScript or animation support.
if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const element = entry.target;
            const total = Number(element.dataset.statCount);
            const started = performance.now();
            const updateCount = (time) => {
                const progress = Math.min((time - started) / 900, 1);
                element.textContent = String(Math.round(total * (1 - Math.pow(1 - progress, 3))));
                if (progress < 1) requestAnimationFrame(updateCount);
            };
            requestAnimationFrame(updateCount);
            statsObserver.unobserve(element);
        });
    }, { threshold: 0.5 });
    document.querySelectorAll('[data-stat-count]').forEach((element) => statsObserver.observe(element));
}

const header = document.querySelector('[data-site-header]');
const menuToggle = document.querySelector('.menu-toggle');

if (header) {
    const updateHeader = () => {
        const isScrolled = window.scrollY > 80;
        header.classList.toggle('is-scrolled', isScrolled);

        if (!isScrolled || header.classList.contains('is-menu-open')) {
            header.classList.remove('is-menu-open');
            menuToggle?.setAttribute('aria-expanded', 'false');
            menuToggle?.setAttribute('aria-label', 'Open navigation');
        }
    };

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });
}

menuToggle?.addEventListener('click', () => {
    const isOpen = header.classList.toggle('is-menu-open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
});

document.querySelectorAll('.main-nav a').forEach((link) => {
    link.addEventListener('click', () => {
        header?.classList.remove('is-menu-open');
        menuToggle?.setAttribute('aria-expanded', 'false');
        menuToggle?.setAttribute('aria-label', 'Open navigation');
    });
});
