document.querySelectorAll('[data-service-folder]').forEach((folder) => {
    const summary = folder.querySelector('summary');
    let animation;
    let expanded = folder.open;
    summary.addEventListener('click', (event) => {
        event.preventDefault();
        const startHeight = folder.getBoundingClientRect().height;
        animation?.cancel();
        expanded = !expanded;
        if (matchMedia('(prefers-reduced-motion: reduce)').matches || !folder.animate) {
            folder.open = expanded;
            folder.style.removeProperty('overflow');
            return;
        }
        // Animate the whole folder so native details rendering cannot flash its contents.
        folder.open = true;
        const endHeight = expanded ? folder.getBoundingClientRect().height : summary.getBoundingClientRect().height;
        folder.style.overflow = 'clip';
        animation = folder.animate([
            { height: startHeight + 'px' },
            { height: endHeight + 'px' },
        ], { duration: 520, easing: 'cubic-bezier(.22,1,.36,1)', fill: 'both' });
        const currentAnimation = animation;
        animation.onfinish = () => {
            if (animation !== currentAnimation) return;
            folder.open = expanded;
            currentAnimation.cancel();
            folder.style.removeProperty('overflow');
            animation = null;
        };
    });
});
