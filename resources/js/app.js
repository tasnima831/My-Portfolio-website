import './bootstrap';

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
