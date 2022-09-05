<div id="featured-courses" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="education__container image-background" style="background-image: linear-gradient(rgba(0, 0, 0, .66), rgba(0, 0, 0, .66)), url('{{ $course->present()->featured_image }}');">
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

                        @if ($course->onlineSellEnabled())
                            <a href="@auth # @else #login-modal @endauth"
                                class="btn btn-danger btn-pill btn-xl @auth btn-checkout @endauth"
                                @auth data-fullmodal="#modal-checkout" @else data-toggle="modal" @endauth
                            >@lang('Buy')</a>
                        @elseif ($course->isAvailable() && $course->enrollment_url)
                            <a href="{{ $course->enrollment_url }}"
                                class="btn btn-danger btn-pill btn-xl btn-checkout"
                                target="_blank">{{ $course->present()->action }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>