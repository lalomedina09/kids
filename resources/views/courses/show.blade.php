@extends(($landing) ? 'layouts.landing' : 'layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $course->id }}'],
                content_category: '{{ $course->category->present()->name }}',
                content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                content_type: 'course'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>

        <script id="fbq-track-InitiateCheckout">
            (function () {
                if (!window.fbq) return;
                var btns = document.getElementsByClassName('btn-checkout');
                if (btns.length <= 0) return;
                for (var b = 0; b < btns.length; b++) {
                    var $btn = btns[b];
                    $btn.addEventListener('click', function (e) {
                        fbq('track', 'InitiateCheckout', {
                            content_ids: ['{{ $course->id }}'],
                            content_category: '{{ $course->category->present()->name }}',
                            content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                            content_type: 'course',
                            currency: 'MXN',
                            num_items: 1
                        });
                    });
                }
            }());
            document.getElementById('fbq-track-InitiateCheckout').remove();
        </script>
    @endpush
@endif

@section('content')
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

    <article class="box-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 d-md-flex justify-content-md-between align-items-md-center education__objective">
                    <h1 class="text-danger text-uppercase education__title--responsive m-0">Nuestros temas</h1>
                    <div>
                        <ul class="text-white text-large education__list--objective">
                            @foreach($course->content as $content)
                                <li>{{ $content->present()->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <article class="py-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="education__title education__title--bottom education__title--danger education__title--responsive text-uppercase text-bold text-center mb-5">Conoce a tus expositores</h1>
                </div>
            </div>
            <div class="row">

                @include('partials.courses.speakers', ['speakers' => $course->speakers])

            </div>
        </div>
    </article>

    @unless($course->itineraries->isEmpty())
        <article class="box-danger box-border-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-md-flex justify-content-md-between align-items-md-center education__schedule">
                        <h1 class="text-primary text-uppercase education__title--responsive text-bold m-0">Itinerario del día</h1>

                        @include('partials.courses.itineraries', ['itineraries' => $course->itineraries])

                    </div>
                </div>
            </div>
        </article>
    @endunless

    <article class="py-5 mt-4">
        <div class="container">
            <div class="row">
                @if ($course->price > 0)
                    <div class="col-12 text-center mb-5">
                        <h1 class="text-primary text-uppercase education__title--responsive text-bold text-underline mb-5">Precio</h1>

                        <p class="text-large mb-4">
                            <img src="{{ asset('images/education/price.svg') }}" class="image--education-include mr-3" alt="Extra">
                            @if($course->currency == 'USD')
                                {{--@if ($course->slug == 'taller-online-inversion-para-principiantes')--}}
                                {{ $Conversion }} {{ $course->currency}}
                            @else
                                @money($course->price)
                            @endif
                        </p>
                    </div>
                @endif

                <div class="@if($course->extra->isEmpty()) col-12 @else col-6 box-border-right @endif mb-4 pb-4">
                    <h1 class="text-primary text-uppercase education__title--responsive text-bold text-underline mb-5">Hora y lugar</h1>
                    @if ($course->venue || $course->address)
                        @if ($course->venue)
                            <p><strong>{{ $course->present()->venue }}</strong></p>
                        @endif
                        @if ($course->address)
                            <p>{{ $course->present()->address }}</p>
                        @endif

                        <hr class="separator--danger w-25">
                    @endif

                    @if ($course->start_event || $course->end_event)
                        <p class="mb-1"><strong>Horario</strong></p>

                        <p class="mb-3">{{ $course->present()->term_date }}</p>

                        <hr class="separator--danger w-25">
                    @endif

                    @unless($course->contacts->isEmpty())
                        <p class="mb-1"><strong>Contacto</strong></p>

                        @foreach($course->contacts as $contact)
                            <p class="m-0">
                                <a href="{{ $contact->present()->address }}" class="text-gray">
                                    <span class="d-inline-block text-center courses__link--icon"><i class="fa fa-{{ $contact->present()->type }}" aria-hidden="true"></i></span>
                                    {{ $contact->present()->name }}
                                </a>
                            </p>
                        @endforeach
                    @endunless
                </div>

                @unless($course->extra->isEmpty())
                    <div class="col-md-6 pl-md-5">
                        <h1 class="text-primary text-uppercase education__title--responsive text-bold text-underline mb-5">¿Qué incluye?</h1>

                        @foreach($course->extra as $material)
                            <p class="text-large mb-4"><img src="{{ $material->present()->icon }}" class="image--education-include mr-3" alt="Recognition image"> {{ $material->present()->name }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-12 text-center mt-5">
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
    </article>

    @auth
        @if ($course->onlineSellEnabled())
            @include('partials.courses.checkout')

            @push('scripts')
                <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
            @endpush
        @endif
    @endauth
@endsection
