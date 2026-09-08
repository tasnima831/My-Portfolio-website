const counterMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

if ('IntersectionObserver' in window && !counterMotion.matches) {
    const counters = [...document.querySelectorAll('[data-stat-count]')];
    const activeFrames = new Map();
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(({ target, isIntersecting }) => {
            if (!isIntersecting) return;
            observer.unobserve(target);
            const total = Number(target.dataset.statCount);
            if (!Number.isFinite(total) || total <= 0) return;
            const started = performance.now();
            target.textContent = '0';
            const update = (now) => {
                const progress = Math.min((now - started) / 1400, 1);
                target.textContent = String(Math.floor(total * progress));
                if (progress < 1) {
                    activeFrames.set(target, requestAnimationFrame(update));
                } else {
                    activeFrames.delete(target);
                }
            };
            activeFrames.set(target, requestAnimationFrame(update));
        });
    }, { threshold: .6 });

    counters.forEach((counter) => observer.observe(counter));
    counterMotion.addEventListener('change', ({ matches }) => {
        if (!matches) return;
        observer.disconnect();
        activeFrames.forEach((frame) => cancelAnimationFrame(frame));
        activeFrames.clear();
        counters.forEach((counter) => { counter.textContent = counter.dataset.statCount; });
    });
}
