@php
    $stack = collect(config('portfolio.skills', []));
    $frontend = $stack->where('group', 'frontend');
    $frameworks = $stack->where('group', 'framework');
    $codingSince = config('portfolio.coding_since');
    $projectCount = config('portfolio.completed_projects');
    $stats = [
        $codingSince !== null
            ? ['value' => max(0, now()->year - (int) $codingSince), 'label' => 'years coding', 'detail' => 'Building for the web']
            : ['value' => 'Full-stack', 'label' => 'development', 'detail' => 'Front end & back end'],
        $projectCount !== null
            ? ['value' => (int) $projectCount, 'label' => 'projects completed', 'detail' => 'Ideas brought to life']
            : ['value' => 'Laravel', 'label' => 'at the core', 'detail' => 'My back-end framework'],
        ['value' => $frontend->count(), 'label' => 'frontend tools', 'detail' => $frontend->pluck('name')->join(', ')],
        ['value' => $frameworks->count(), 'label' => 'frameworks', 'detail' => $frameworks->pluck('name')->join(' & ')],
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
