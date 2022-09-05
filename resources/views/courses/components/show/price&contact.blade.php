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