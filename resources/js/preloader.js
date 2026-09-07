const preloader = document.querySelector('[data-preloader]');

if (preloader && document.documentElement.classList.contains('is-loading')) {
    const counter = preloader.querySelector('[data-preloader-count]');
    const handwriting = preloader.querySelector('[data-writing-path]');
    const details = preloader.querySelector('[data-writing-details]');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const duration = reducedMotion ? 150 : 4200;
    const started = performance.now();
    const clamp = (value) => Math.max(0, Math.min(1, value));
    const finish = () => {
        document.documentElement.classList.remove('is-loading');
        preloader.remove();
    };

    const animate = (now) => {
        if (!document.documentElement.classList.contains('is-loading')) {
            finish();
            return;
        }
        const progress = clamp((now - started) / duration);
        counter.textContent = `${Math.floor(progress * 100)}%`;
        handwriting.style.strokeDashoffset = 1 - clamp(progress / .92);
        details.style.strokeDashoffset = 1 - clamp((progress - .78) / .22);

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            window.setTimeout(() => {
                preloader.classList.add('is-leaving');
                window.setTimeout(finish, reducedMotion ? 0 : 850);
            }, reducedMotion ? 0 : 200);
        }
    };

    requestAnimationFrame(animate);
}
