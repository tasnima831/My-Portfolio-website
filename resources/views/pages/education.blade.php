<section class="content-section content-section--accent content-section--education" id="education" aria-labelledby="education-heading experience-heading">
    <div class="education-section-inner">
        @php
            $educationEntries = collect(config('portfolio.education', []));
            $experienceEntries = collect(config('portfolio.experience', []))->map(function ($entry) {
                $entry['timeline_period'] = $entry['timeline_period'] ?? $entry['year'];
                return $entry;
            });
            $periods = $educationEntries->pluck('years')
                ->merge($experienceEntries->pluck('timeline_period'))
                ->unique()->sortByDesc(fn ($period) => (int) $period);
        @endphp
        <div class="journey-headings">
            <h2 id="education-heading">Education</h2>
            <span class="sr-only">Year</span>
            <h2 id="experience-heading">Experience</h2>
        </div>
        <ol class="journey-rows">
            @foreach ($periods as $period)
                <li class="journey-row">
                    <div class="journey-education">
                        @foreach ($educationEntries->where('years', $period) as $education)
                            <article class="journey-entry" aria-label="Education">
                                <h3>{{ $education['qualification'] }}</h3>
                                <p class="education-entry__institution">{{ $education['institution'] }}</p>
                                <dl class="education-entry__meta">
                                    @if (!empty($education['field']))<div><dt>Field</dt><dd>{{ $education['field'] }}</dd></div>@endif
                                    @if (!empty($education['cgpa']))<div><dt>CGPA</dt><dd>{{ $education['cgpa'] }}</dd></div>
                                    @elseif (!empty($education['gpa']))<div><dt>GPA</dt><dd>{{ $education['gpa'] }}</dd></div>@endif
                                </dl>
                                @if (!empty($education['description']))<p class="education-entry__description">{{ $education['description'] }}</p>@endif
                                @if (!empty($education['expected_finish']))<p class="education-entry__description">Expected Finish: {{ $education['expected_finish'] }}</p>@endif
                            </article>
                        @endforeach
                    </div>
                    <div class="journey-year">{{ $period }}</div>
                    <div class="journey-experience">
                        @foreach ($experienceEntries->where('timeline_period', $period) as $experience)
                            <article class="journey-entry" aria-label="Experience">
                                <h3>{{ $experience['title'] }}</h3>
                                <p class="education-entry__institution">{{ $experience['organization'] }}</p>
                                <dl class="education-entry__meta"><div><dt>Duration</dt><dd>{{ $experience['duration'] }}</dd></div></dl>
                                <p class="education-entry__description">{{ $experience['description'] }}</p>
                                <p class="education-entry__description">Year: {{ $experience['year'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
