<section class="content-section content-section--skills" id="skills" aria-labelledby="skills-heading">
    <div class="skills-section-inner">
        <h2 id="skills-heading">Skills</h2>
        @php
            $skillGroups = [
                'frontend' => 'Frontend',
                'backend' => 'Backend',
                'framework' => 'Frameworks',
                'tool' => 'Tools',
            ];
            $skills = collect(config('portfolio.skills', []));
        @endphp
        <div class="skills-groups">
            @foreach ($skillGroups as $group => $label)
                <section class="skills-group" aria-labelledby="skills-{{ $group }}-heading">
                    <div class="skills-group__header">
                        <h3 id="skills-{{ $group }}-heading">{{ $label }}</h3>
                    </div>
                    <ul class="skills-grid">
                        @foreach ($skills->where('group', $group) as $skill)
                            <li class="skill-card">
                                <div class="skill-card__logo"><img src="{{ str_starts_with($skill['icon'], 'http') ? $skill['icon'] : asset('images/skills/' . $skill['icon'] . '.svg') }}" alt="" width="44" height="44" loading="lazy"></div>
                                <div class="skill-card__copy">
                                    <span class="skill-card__name">{{ $skill['name'] }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </div>
    </div>
</section>
