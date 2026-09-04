import './bootstrap';

const header = document.querySelector('[data-site-header]');

if (header) {
    const updateHeader = () => header.classList.toggle('is-scrolled', window.scrollY > 80);

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });
}
