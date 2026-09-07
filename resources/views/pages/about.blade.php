<main>
    <section class="content-section content-section--about" id="about">
        <div class="about-layout">
            <div class="about-copy">
                <br><span class="about-kicker">The person behind the work</span>
                <h2>About Me</h2>
                <p>I’m Tasnima Akther Tisha, a <strong>full-stack developer</strong> who creates clean, reliable, and user-friendly web applications.</p>
<p>I work across both the front end and back end, using <strong>HTML, CSS, JavaScript, PHP, and Laravel</strong> to build complete digital experiences. I believe a great website should combine a welcoming design with a strong technical foundation. My focus is on <strong>thoughtful design</strong>, <strong>readable code</strong>, and attention to the small details that make an application simple and comfortable to use. Beyond development, I enjoy <strong>debating</strong> and exploring different ideas and perspectives. <a class="about-more-link" href="{{ route('about.more') }}">See more <span aria-hidden="true">&rarr;</span></a></p>
            </div>

            @include('pages.about_stats')
        </div>
    </section>
</main>
