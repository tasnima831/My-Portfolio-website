document.querySelectorAll('[data-project-gallery]').forEach((gallery) => {
    const slides = [...gallery.querySelectorAll('[data-gallery-slide]')];
    if (slides.length < 2) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    const selectors = [...gallery.querySelectorAll('[data-gallery-select]')];
    const pause = gallery.querySelector('[data-gallery-pause]');
    const dialog = gallery.closest('dialog');
    let current = 0;
    let paused = reduced.matches;
    let timer;
    const stop = () => clearInterval(timer);
    const show = (index) => {
        current = (index + slides.length) % slides.length;
        slides.forEach((slide, i) => {
            slide.classList.toggle('is-active', i === current);
            slide.setAttribute('aria-hidden', String(i !== current));
            slide.querySelector('[data-gallery-expand]').tabIndex = i === current ? 0 : -1;
            selectors[i].setAttribute('aria-pressed', String(i === current));
        });
        gallery.querySelector('[data-gallery-count]').textContent = `${String(current + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
    };
    const start = (allowFocusedPlayback = false) => {
        stop();
        if (!paused && !gallery.hasAttribute('data-image-expanded') && (!dialog || dialog.open) && !document.hidden && (allowFocusedPlayback === true || !gallery.contains(document.activeElement))) {
            timer = setInterval(() => show(current + 1), 5000);
        }
    };
    const updatePause = () => {
        pause.textContent = paused ? 'Play' : 'Pause';
        pause.setAttribute('aria-label', paused ? 'Play slideshow' : 'Pause slideshow');
    };
    const select = (index) => { show(index); start(); };
    selectors.forEach((button, i) => button.addEventListener('click', () => select(i)));
    gallery.querySelector('[data-gallery-prev]').addEventListener('click', () => select(current - 1));
    gallery.querySelector('[data-gallery-next]').addEventListener('click', () => select(current + 1));
    pause.addEventListener('click', () => { paused = !paused; updatePause(); start(!paused); });
    gallery.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
            event.preventDefault();
            select(current + (event.key === 'ArrowLeft' ? -1 : 1));
        }
    });
    gallery.addEventListener('focusin', stop);
    gallery.addEventListener('focusout', () => setTimeout(start, 0));
    document.addEventListener('visibilitychange', start);
    gallery.addEventListener('gallery-lightbox-change', start);
    dialog?.addEventListener('project-modal-change', start);
    reduced.addEventListener('change', () => { paused = reduced.matches; updatePause(); start(); });
    gallery.querySelector('[data-gallery-controls]').hidden = false;
    updatePause();
    start();
});
