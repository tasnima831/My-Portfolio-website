<section class="content-section content-section--accent" id="contact" aria-labelledby="contact-heading">
    <p class="eyebrow">Contact</p>
    <h2 id="contact-heading">Let’s work together.</h2>
    <p>Have a project in mind? I’d love to hear about it.</p>
    @if (config('portfolio.contact_email'))
        <a href="mailto:{{ config('portfolio.contact_email') }}">{{ config('portfolio.contact_email') }}</a>
    @endif
</section>
