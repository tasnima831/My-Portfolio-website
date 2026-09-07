<section class="content-section content-section--services" id="services" aria-labelledby="services-heading">
    <div class="services-inner">
        <header class="services-heading">
            <p class="eyebrow">Services / How I can help</p>
            <h2 id="services-heading">Your ideas.<br><em>Thoughtfully built.</em></h2>
        </header>
        <div class="services-folders">
            @foreach (config('portfolio.services', []) as $service)
                <details class="service-folder" data-service-folder>
                    <summary>
                        <span class="service-number" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $service['title'] }}</h3>
                        <span class="service-arrow" aria-hidden="true">&#8599;</span>
                    </summary>
                    <div class="service-folder__content">
                        <div class="service-folder__body">
                            <div><p>{{ $service['description'] }}</p><p class="service-includes">{{ $service['details'] }}</p></div>
                            <a href="{{ url('/') }}#contact">Let’s talk <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
