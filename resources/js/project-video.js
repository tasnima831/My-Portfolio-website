document.querySelectorAll('[data-project-video]').forEach((section) => {
    const video = section.querySelector('video');
    const button = section.querySelector('[data-video-fullscreen]');
    if (!video || !button) return;
    if (!video.requestFullscreen && !video.webkitEnterFullscreen) return;
    button.hidden = false;
    button.addEventListener('click', () => {
        // Request fullscreen within the click gesture, before awaiting playback.
        try {
            if (video.requestFullscreen) {
                video.requestFullscreen().catch(() => { /* Native video controls remain available. */ });
            } else {
                video.webkitEnterFullscreen();
            }
        } catch { /* Native video controls remain available. */ }
        video.play().catch(() => { /* The user can retry with the native play control. */ });
    });
});
