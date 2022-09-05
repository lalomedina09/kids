<article class="py-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-uppercase text-center">
                    @if ($course->city)
                        {{ $course->present()->city }},
                    @endif
                    @if ($course->start_event)
                        {{ $course->present()->readable_event_date }}
                    @endif
                </p>

                <h1 class="text-center text-uppercase text-bold education__title education__title--bottom education__title--danger education__title--responsive mb-5">
                    {{ $course->present()->subtitle }}
                </h1>

                {!! $course->present()->body !!}
            </div>
        </div>
    </div>
</article>