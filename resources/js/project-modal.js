const projectDialogs = [...document.querySelectorAll('[data-project-modal]')];
projectDialogs.forEach((dialog) => {
    let opener;
    let closing = false;
    const close = async () => {
        if (closing || !dialog.open) return;
        closing = true;

        dialog.classList.add('is-closing');
        if (!matchMedia('(prefers-reduced-motion: reduce)').matches) {
            await Promise.allSettled(dialog.getAnimations().map((animation) => animation.finished));
        }
        dialog.close();
        dialog.classList.remove('is-closing');
        document.documentElement.classList.remove('project-modal-open');
        dialog.dispatchEvent(new Event('project-modal-change'));
        opener?.focus({ preventScroll: true });
        closing = false;
    };
    document.querySelectorAll('[data-project-open]').forEach((link) => {
        if (link.dataset.projectOpen !== dialog.dataset.projectModal) return;
        link.addEventListener('click', (event) => {
            if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || !dialog.showModal) return;
            event.preventDefault();
            opener = link;
            dialog.showModal();
            dialog.scrollTop = 0;
            document.documentElement.classList.add('project-modal-open');
            dialog.querySelector('[data-project-close]').focus({ preventScroll: true });
            dialog.dispatchEvent(new Event('project-modal-change'));
            Promise.allSettled(dialog.getAnimations().map((animation) => animation.finished)).then(() => {
                if (!dialog.open || closing) return;
                dialog.scrollTo({ top: 32, behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth' });
            });
        });
    });
    dialog.querySelector('[data-project-close]').addEventListener('click', close);
    dialog.addEventListener('cancel', (event) => { event.preventDefault(); close(); });
    dialog.addEventListener('click', (event) => {
        if (event.target !== dialog) return;
        const bounds = dialog.getBoundingClientRect();
        if (event.clientY < bounds.top || event.clientY > bounds.bottom || event.clientX < bounds.left || event.clientX > bounds.right) close();
    });
});

