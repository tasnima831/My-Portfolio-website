        <header class="project-detail__intro">
            <p class="eyebrow">Selected work / Project details</p>
            <h1>{{ $project['title'] }}</h1>
            <p>{{ $project['description'] }}</p>
            @if (!empty($project['tags']))
                <ul class="project-tags" aria-label="Technologies">@foreach ($project['tags'] as $tag)<li>{{ $tag }}</li>@endforeach</ul>
            @endif
        </header>
        <div class="project-detail__body">
        @php
            $slides = collect($project['gallery'] ?? []);
            if (!empty($project['image'])) {
                $slides->prepend(['image' => $project['image'], 'alt' => $project['title'].' preview', 'caption' => 'Project preview']);
            }
        @endphp
        @if ($slides->isNotEmpty())
            <section class="project-gallery project-gallery--wide" data-project-gallery aria-label="Project images" aria-roledescription="carousel">
                <div class="project-gallery__stage">
                    @foreach ($slides as $slide)
                        <figure class="project-gallery__slide @if ($loop->first) is-active @endif" data-gallery-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}" aria-label="{{ $loop->iteration }} of {{ $slides->count() }}">
                            <button class="project-gallery__expand" type="button" data-gallery-expand aria-label="Enlarge {{ $slide['alt'] ?? $project['title'].' screenshot' }}" tabindex="{{ $loop->first ? '0' : '-1' }}"><img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] ?? $project['title'].' screenshot' }}" width="800" height="460"></button>
                        </figure>
                    @endforeach
                </div>
                @if ($slides->count() > 1)
                    <div class="project-gallery__controls" data-gallery-controls hidden>
                        <div class="project-gallery__thumbnails">
                            @foreach ($slides as $slide)
                                <button type="button" data-gallery-select="{{ $loop->index }}" aria-label="Show image {{ $loop->iteration }}: {{ $slide['caption'] ?? 'Project screenshot' }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"><img src="{{ asset($slide['image']) }}" alt="" width="160" height="92"></button>
                            @endforeach
                        </div>
                        <div class="project-gallery__navigation">
                            <button type="button" data-gallery-prev aria-label="Previous image">&larr;</button>
                            <span data-gallery-count>01 / {{ str_pad($slides->count(), 2, '0', STR_PAD_LEFT) }}</span>
                            <button type="button" data-gallery-next aria-label="Next image">&rarr;</button>
                            <button type="button" data-gallery-pause aria-label="Pause slideshow">Pause</button>
                        </div>
                    </div>
                @endif
            </section>
        @endif
        <div class="project-detail__information">
        @if (!empty($project['role']) || !empty($project['timeline']))
            <dl class="project-detail__meta">
                @foreach (['role' => 'My role', 'timeline' => 'Timeline'] as $key => $label)
                    @if (!empty($project[$key]))<div><dt>{{ $label }}</dt><dd>{{ $project[$key] }}</dd></div>@endif
                @endforeach
            </dl>
        @endif
        @foreach (['overview' => 'Overview', 'solution' => 'The solution', 'outcome' => 'The outcome'] as $key => $label)
            @if (!empty($project[$key]))
                <section class="project-detail__section"><h2>{{ $label }}</h2><p>{{ $project[$key] }}</p></section>
            @endif
        @endforeach
        @if (!empty($project['features']))
            <section class="project-detail__section"><h2>Key features</h2><ul>@foreach ($project['features'] as $feature)<li>{{ $feature }}</li>@endforeach</ul></section>
        @endif

        @if (!empty($project['challenge']) || !empty($project['future_improvements']))
            <div class="project-reflections">
                @foreach (['challenge' => 'Challenges faced', 'future_improvements' => 'Future improvements'] as $key => $label)
                    @if (!empty($project[$key]))
                        <section class="project-reflections__item">
                            <span class="project-reflections__mark" aria-hidden="true">{{ $key === 'challenge' ? '01' : '02' }}</span>
                            <h2>{{ $label }}</h2>
                            <ul>
                                @foreach ((array) $project[$key] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>
                    @endif
                @endforeach
            </div>
        @endif
        @if (!empty($project['demo_url']) || !empty($project['source_url']))
            <nav class="project-detail__actions" aria-label="Explore this project">
                @foreach (['demo_url' => 'Live Demo', 'source_url' => 'GitHub Repo'] as $key => $label)
                    @if (!empty($project[$key]))
                        <a class="{{ $key === 'demo_url' ? 'is-primary' : '' }}" href="{{ $project[$key] }}" target="_blank" rel="noopener noreferrer">{{ $label }} <span aria-hidden="true">&rarr;</span><span class="sr-only"> (opens in a new tab)</span></a>
                    @endif
                @endforeach
            </nav>
        @endif
</div></div>


