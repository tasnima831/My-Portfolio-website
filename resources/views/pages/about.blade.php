<main>
    <section class="content-section content-section--about" id="about">
        <div class="about-layout">
            <div class="about-copy">
                <br><span class="about-kicker">The person behind the work</span>
                <h2>About Me</h2>
                <p>I’m Tasnima Akther Tisha, a full-stack developer who creates clean, reliable, and user-friendly web applications.</p>
<p>I work across both the front end and back end, using HTML, CSS, JavaScript, PHP, and Laravel to build complete digital experiences. I believe a great website should combine a welcoming design with a strong technical foundation. My focus is on thoughtful design, readable code, and attention to the small details that make an application simple and comfortable to use. Beyond development, I enjoy debating and exploring different ideas and perspectives. <a class="about-more-link" href="{{ route('about.more') }}">See more <span aria-hidden="true">&rarr;</span></a></p>
            </div>

            @include('pages.about_stats')
        </div>
    </section>
</main>
