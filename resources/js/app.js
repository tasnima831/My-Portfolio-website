import './preloader';
import './stat-counters';
import './bootstrap';


import './project-modal';
import './project-gallery';
import './project-lightbox';

const header = document.querySelector('[data-site-header]');
const menuToggle = document.querySelector('.menu-toggle');
const compactNavigation = window.matchMedia('(max-width: 1100px)');
const closeNavigation = () => {
    header?.classList.remove('is-menu-open');
    menuToggle?.setAttribute('aria-expanded', 'false');
    menuToggle?.setAttribute('aria-label', 'Open navigation');
};

if (header) {
    const updateHeader = () => {
        const isScrolled = window.scrollY > 80;
        header.classList.toggle('is-scrolled', isScrolled);

        if (!compactNavigation.matches) {
            closeNavigation();
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
    link.addEventListener('click', closeNavigation);
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && header?.classList.contains('is-menu-open')) {
        closeNavigation();
        menuToggle?.focus();
    }
});
document.addEventListener('click', (event) => {
    if (header && !header.contains(event.target)) closeNavigation();
});
compactNavigation.addEventListener('change', closeNavigation);

// Folder and project navigation use cancellable browser animations.
document.querySelectorAll('[data-project-archive]').forEach((archive) => {
    const trigger = archive.querySelector('.archive-trigger');
    const deck = archive.querySelector('.archive-deck');
    const cards = [...archive.querySelectorAll('[data-archive-card]')];
    const close = archive.querySelector('[data-archive-close]');
    const prev = archive.querySelector('[data-project-prev]');
    const next = archive.querySelector('[data-project-next]');
    const status = archive.querySelector('[data-project-status]');
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    let index = 0;
    let busy = false;
    const animate = async (element, frames, duration = 500) => {
        if (reduced.matches || !element.animate) return;
        await element.animate(frames, { duration, easing: 'cubic-bezier(.22,1,.36,1)' }).finished;
    };
    const arrange = () => {
        cards.forEach((card, position) => {
            let offset = (position - index + cards.length) % cards.length;
            if (offset > cards.length / 2) offset -= cards.length;
            card.hidden = false;
            card.style.setProperty('--offset', offset);
            card.style.setProperty('--depth', Math.abs(offset));
            card.style.zIndex = cards.length - Math.abs(offset);
            card.classList.toggle('is-selected', offset === 0);



        });
        status.textContent = `${index + 1} / ${cards.length}`;
    };
    trigger.addEventListener('click', async () => {
        if (busy) return;
        busy = true;
        await animate(trigger, [{ opacity: 1, transform: 'translateY(0)' }, { opacity: 0, transform: 'translateY(35px) scale(.94)' }], 260);
        trigger.hidden = true;
        trigger.setAttribute('aria-expanded', 'true');
        deck.hidden = false;
        arrange();
        close.focus({ preventScroll: true });
        if (!reduced.matches && cards[0]?.animate) {
            await Promise.all(cards.map((card, order) => {
                const destination = getComputedStyle(card).transform;
                return card.animate([
                    { opacity: 0, transform: 'translateY(100px) scale(.65) rotate(-12deg)' },
                    { opacity: 1, transform: destination },
                ], { duration: 750, delay: order * 110, fill: 'backwards', easing: 'cubic-bezier(.22,1,.36,1)' }).finished;
            }));
        }
        busy = false;
    });
    const shut = async () => {
        if (busy || deck.hidden) return;
        busy = true;
        await animate(deck, [{ opacity: 1, transform: 'none' }, { opacity: 0, transform: 'translateY(55px) scale(.9)' }], 280);
        deck.hidden = true;
        trigger.hidden = false;
        trigger.setAttribute('aria-expanded', 'false');
        trigger.focus({ preventScroll: true });
        await animate(trigger, [{ opacity: 0, transform: 'translateY(-20px)' }, { opacity: 1, transform: 'none' }]);
        busy = false;
    };
    const show = (direction) => {
        if (busy || cards.length < 2) return;
        index = (index + direction + cards.length) % cards.length;
        arrange();
    };
    prev.disabled = next.disabled = cards.length < 2;
    prev.addEventListener('click', () => show(-1));
    next.addEventListener('click', () => show(1));
    close.addEventListener('click', shut);
    archive.addEventListener('keydown', (event) => {
        if (deck.hidden) return;
        if (event.key === 'Escape') { event.preventDefault(); shut(); }
        if (event.key === 'ArrowLeft') { event.preventDefault(); show(-1); }
        if (event.key === 'ArrowRight') { event.preventDefault(); show(1); }
    });
    let touchX = null;
    const stage = archive.querySelector('.archive-stage');
    stage.addEventListener('touchstart', (event) => { touchX = { x: event.touches[0].clientX, y: event.touches[0].clientY }; }, { passive: true });
    stage.addEventListener('touchend', (event) => {
        if (!touchX) return;
        const dx = event.changedTouches[0].clientX - touchX.x;
        const dy = event.changedTouches[0].clientY - touchX.y;
        if (Math.abs(dx) > 55 && Math.abs(dx) > Math.abs(dy)) show(dx < 0 ? 1 : -1);
        touchX = null;
    }, { passive: true });
});


import './contact-select';
