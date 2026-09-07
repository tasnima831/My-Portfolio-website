<section class="content-section contact-section" id="contact" aria-labelledby="contact-heading">
    <div class="contact-layout">
        <div class="contact-copy">
            <p class="eyebrow">Have an idea? Let's make it happen</p>
            <h2 id="contact-heading">Hire me for<br>your next<br><em>great project.</em></h2>
            <p class="contact-intro">I’d love to turn your vision into a complete web application—tell me what you have in mind.</p>
            <div class="contact-details">
                @if (config('portfolio.contact_email'))
                    <a class="contact-detail" href="mailto:{{ config('portfolio.contact_email') }}">
                        <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m3 6 9 7 9-7"/></svg>
                        <span>{{ config('portfolio.contact_email') }}</span>
                    </a>
                @endif
                {{-- Sample details: replace the phone number, profile URLs, and usernames below. --}}
                <a class="contact-detail" href="tel:+8801827392160">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 3.1 5.2 2 2 0 0 1 5.1 3h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L9 10.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 .8 1.1Z"/></svg>
                    <span>+880 1827392160</span>
                </a>
                <a class="contact-detail" href="https://www.linkedin.com/in/tasnima-akther-tisha/" target="_blank" rel="noopener noreferrer">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="4" cy="4" r="2"/><path d="M2 9h4v13H2zM10 9h4v2a4 4 0 0 1 8 2v9h-4v-8a2 2 0 0 0-4 0v8h-4z"/></svg>
                    <span>LinkedIn: Tasnima Akther Tisha<span class="sr-only"> (opens in a new tab)</span></span>
                </a>
                <a class="contact-detail" href="https://github.com/tasnima831" target="_blank" rel="noopener noreferrer">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 22v-4c-4 1-4-2-6-3m12 7v-4a3.5 3.5 0 0 0-1-2.7c3.3-.4 6.7-1.6 6.7-7.3a5.7 5.7 0 0 0-1.5-4c.2-1 .2-2-.2-3 0 0-1.2-.4-4 1.5a14 14 0 0 0-7 0C5.2.6 4 1 4 1c-.4 1-.4 2-.2 3a5.7 5.7 0 0 0-1.5 4c0 5.7 3.4 6.9 6.7 7.3A3.5 3.5 0 0 0 8 18v4"/></svg>
                    <span>GitHub: tasnima831<span class="sr-only"> (opens in a new tab)</span></span>
                </a>
            </div>
        </div>
        <form class="contact-form" action="{{ route('contact.send') }}" method="POST">
            @csrf
            @if (session('contact_success'))<p class="contact-notice" role="status">{{ session('contact_success') }}</p>@endif
            @if ($errors->any())
                <div class="contact-notice contact-notice--error" role="alert">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
            @endif
            <div class="contact-field"><label for="contact-name">Name</label><input id="contact-name" name="name" autocomplete="name" placeholder="Your name" value="{{ old('name') }}" maxlength="100" required></div>
            <div class="contact-field"><label for="contact-email">Email</label><input id="contact-email" type="email" name="email" autocomplete="email" placeholder="you@example.com" value="{{ old('email') }}" maxlength="254" required></div>
            <div class="contact-field">
                <label for="contact-type">Project type</label>
                <select id="contact-type" name="project_type" required>
                    <option value="" disabled @selected(!old('project_type'))>What can I help you with?</option>
                    @foreach (['Website development', 'Laravel application', 'Website redesign', 'Other project'] as $type)
                        <option @selected(old('project_type') === $type)>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="contact-field"><label for="contact-message">Message</label><textarea id="contact-message" name="message" placeholder="Tell me about your project, timeline, and ideas..." rows="4" minlength="10" maxlength="5000" required>{{ old('message') }}</textarea></div>
            <button class="contact-submit" type="submit">Send message</button>
        </form>
    </div>
</section>
