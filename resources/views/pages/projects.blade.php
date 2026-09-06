<section class="content-section content-section--projects" id="projects" aria-labelledby="projects-heading">
    <div class="projects-inner">
        <div class="projects-heading"><div><p class="eyebrow">Selected work</p><h2 id="projects-heading">Ideas, brought to life.</h2></div></div>
        @php($projects = collect(config('portfolio.projects', [])))
        @if ($projects->isNotEmpty())
        <div class="project-archive" data-project-archive>
            <button class="archive-trigger" type="button" aria-expanded="false" aria-controls="project-deck">
                <span class="archive-folder" aria-hidden="true">
                    <span class="archive-back"></span>
                    @foreach ($projects->take(3) as $project)
                    <span class="archive-file" style="--file-index: {{ $loop->index }}">
                        @if (!empty($project['image']))<img src="{{ asset($project['image']) }}" alt="">@else<span class="archive-file-art">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}<small>{{ $project['title'] }}</small></span>@endif
                    </span>
                    @endforeach
                    <span class="archive-front"><span><small>A collection of my work</small><strong>Projects</strong></span><span class="archive-arrow">&#8599;</span></span>
                </span>
                <span class="archive-caption">Click me to see my projects <span aria-hidden="true">&#8599;</span></span>
            </button>
            <div class="archive-deck" id="project-deck" hidden>
                <div class="archive-stage">
                    @foreach ($projects as $project)
                    <article class="archive-card" data-archive-card @if (!$loop->first) hidden @endif aria-label="Project {{ $loop->iteration }} of {{ $projects->count() }}">
                        <button class="archive-select" type="button" data-select-project aria-label="Show {{ $project['title'] }}" hidden></button><div class="archive-card-preview">
                            @if (!empty($project['image']))<img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }} preview" loading="lazy" width="800" height="500">@else<div class="archive-card-art" aria-hidden="true"><span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><small>Project preview</small></div>@endif
                        </div>
                        <div class="archive-card-copy">
                            @if (!empty($project['tags']))<ul class="project-tags" aria-label="Technologies">@foreach ($project['tags'] as $tag)<li>{{ $tag }}</li>@endforeach</ul>@endif
                            <h3>{{ $project['title'] }}</h3>
                            <p>{{ $project['description'] }}</p>
                            @php($detailsUrl = $project['details_url'] ?? $project['demo_url'] ?? $project['source_url'] ?? null)
                            @if ($detailsUrl)<a class="project-details-link" href="{{ $detailsUrl }}" target="_blank" rel="noopener noreferrer">View Details <span aria-hidden="true">&#8594;</span><span class="sr-only"> for {{ $project['title'] }} (opens in a new tab)</span></a>@endif
                            @if (!empty($project['demo_url']) || !empty($project['source_url']))<div class="project-links">
                                @if (!empty($project['demo_url']))<a href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer">Live demo &#8599;<span class="sr-only"> (opens in a new tab)</span></a>@endif
                                @if (!empty($project['source_url']))<a href="{{ $project['source_url'] }}" target="_blank" rel="noopener noreferrer">Source code &#8599;<span class="sr-only"> (opens in a new tab)</span></a>@endif
                            </div>@endif
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="archive-controls"><button type="button" data-project-prev aria-label="Previous project">&#8592;</button><span data-project-status aria-live="polite" aria-atomic="true">1 / {{ $projects->count() }}</span><button type="button" data-project-next aria-label="Next project">&#8594;</button></div>
                <div class="archive-toolbar"><button type="button" data-archive-close>Close folder <span aria-hidden="true">&times;</span></button></div>
            </div>
        </div>
        @endif
    </div>
</section>





