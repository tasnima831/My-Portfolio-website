<section class="content-section content-section--accent content-section--education" id="education" aria-labelledby="education-heading">
    <div class="education-section-inner">
        <h2 id="education-heading">Education</h2>
        <ol class="education-timeline">
            @foreach (config('portfolio.education', []) as $education)
                <li class="education-entry">
                    <span class="education-entry__years">{{ $education['years'] }}</span>
                    <div class="education-entry__details">
                        <h3>{{ $education['qualification'] }}</h3>
                        <p class="education-entry__institution">{{ $education['institution'] }}</p>
                        <dl class="education-entry__meta">
                            @if (!empty($education['field']))
                                <div><dt>Field</dt><dd>{{ $education['field'] }}</dd></div>
                            @endif
                            @if (!empty($education['cgpa']))
                                <div><dt>CGPA</dt><dd>{{ $education['cgpa'] }}</dd></div>
                            @elseif (!empty($education['gpa']))
                                <div><dt>GPA</dt><dd>{{ $education['gpa'] }}</dd></div>
                            @endif
                        </dl>
                        @if (!empty($education['description']))
                            <p class="education-entry__description">{{ $education['description'] }}</p>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
