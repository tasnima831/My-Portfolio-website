const lightbox = document.createElement('dialog');
lightbox.className = 'project-lightbox';
lightbox.setAttribute('aria-label', 'Full-size project image. Click anywhere or press Escape to close.');
const fullImage = document.createElement('img');
const closeButton = document.createElement('button');
closeButton.type = 'button';
closeButton.className = 'project-lightbox__close';
closeButton.textContent = '\u00d7';
closeButton.setAttribute('aria-label', 'Close full-size image');
lightbox.append(fullImage, closeButton);
document.body.append(lightbox);
let trigger;
let activeGallery;
lightbox.addEventListener('click', (event) => { event.stopPropagation(); lightbox.close(); });
lightbox.addEventListener('cancel', (event) => { event.stopPropagation(); });
lightbox.addEventListener('close', () => {
    document.documentElement.classList.remove('project-image-open');
    trigger?.focus({ preventScroll: true });
    activeGallery?.removeAttribute('data-image-expanded');
    activeGallery?.dispatchEvent(new Event('gallery-lightbox-change'));
});
document.querySelectorAll('[data-gallery-expand]').forEach((button) => {
    button.addEventListener('click', () => {
        trigger = button;
        activeGallery = button.closest('[data-project-gallery]');
        const preview = button.querySelector('img');
        fullImage.src = preview.currentSrc || preview.src;
        fullImage.alt = preview.alt;
        activeGallery.setAttribute('data-image-expanded', '');
        activeGallery.dispatchEvent(new Event('gallery-lightbox-change'));
        document.documentElement.classList.add('project-image-open');
        (button.closest('dialog') || document.body).append(lightbox);
        lightbox.showModal();
        closeButton.focus({ preventScroll: true });
    });
});

