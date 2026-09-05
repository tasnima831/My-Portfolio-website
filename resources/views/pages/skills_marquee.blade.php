@php
    $marqueeSkills = ['Full-Stack Developer', 'Laravel', 'PHP', 'JavaScript', 'HTML', 'CSS', 'Tailwind CSS'];
@endphp

<div class="skills-marquee" tabindex="0" role="region" aria-label="Development skills. Focus or hover to pause scrolling.">
    <div class="skills-marquee__track">
        @for ($copy = 0; $copy < 2; $copy++)
            <ul class="skills-marquee__group" @if ($copy > 0) aria-hidden="true" @endif>
                @foreach ($marqueeSkills as $marqueeSkill)
                    <li>{{ $marqueeSkill }}<span aria-hidden="true">&middot;</span></li>
                @endforeach
            </ul>
        @endfor
    </div>
</div>
