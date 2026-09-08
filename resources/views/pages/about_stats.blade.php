@php
    $liveWebsiteCount = config('portfolio.live_websites');
    if ($liveWebsiteCount === null) {
        $liveWebsiteCount = collect(config('portfolio.projects', []))
            ->filter(fn ($project) => filled($project['demo_url'] ?? null))
            ->count();
    }
    $codingSince = config('portfolio.coding_since');
    $projectCount = config('portfolio.completed_projects');
    $stats = [
        $codingSince !== null
            ? ['value' => max(0, now()->year - (int) $codingSince), 'label' => 'years coding', 'detail' => 'Building for the web']
            : ['value' => 'Full-stack', 'label' => 'development', 'detail' => 'Front end & back end'],
        $projectCount !== null
            ? ['value' => (int) $projectCount, 'label' => 'projects completed', 'detail' => 'Ideas brought to life']
            : ['value' => 'Laravel', 'label' => 'at the core', 'detail' => 'My back-end framework'],
        ['value' => (int) $liveWebsiteCount, 'label' => 'live websites', 'detail' => 'Built and deployed for the web'],
        ['value' => 1, 'label' => 'framework', 'detail' => 'Laravel'],
    ];
@endphp
<ul class="about-stats" aria-label="My development at a glance">
    @foreach ($stats as $stat)
        <li class="about-stat">
            <span class="about-stat__index" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
            <h3><span class="about-stat__value" @if (is_int($stat['value'])) data-stat-count="{{ $stat['value'] }}" @endif>{{ $stat['value'] }}</span><span class="about-stat__label">{{ $stat['label'] }}</span></h3>
            <p>{{ $stat['detail'] }}</p>
        </li>
    @endforeach
</ul>
