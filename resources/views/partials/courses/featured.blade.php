<div class="education__container image-background" style="background-image: linear-gradient(rgba(0, 0, 0, .66), rgba(0, 0, 0, .66)), url('{{ $course->present()->slider_image }}');">
    <div class="container">
        <div class="align-items-center text-center text-uppercase align-vertical">
            <p class="text-danger">
                @if ($course->city)
                    {{ $course->present()->city }},
                @endif
                @if ($course->start_event)
                    {{ $course->present()->readable_event_date }}
                @endif
            </p>

            <h1 class="text-white education__title--responsive mb-4">{{ $course->present()->title }}</h1>
            <a href="{{ $course->present()->url }}" class="btn btn-dark btn-pill btn-xl">@lang('More')</a>
        </div>
    </div>
</div>
