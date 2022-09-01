<div class="videos__featured d-md-flex mt-5">
    <div class="image--education-featured image-background mb-1" style="background-image: url('{{ $course->present()->thumbnail_image }}');"></div>

    <div class="categories__featured-container pos-rel">
        <div class="rich__featured-content">
            <h2 class="text-bold text-uppercase">{{ $course->present()->title }}</h2>

            @if ($course->start_event)
                <span class="text-danger text-uppercase text-xsmall">Próxima fecha: {{ $course->present()->event_date }}</span>
            @endif

            <hr class="separator--danger">

            <p class="text-primary my-3">{!! $course->present()->excerpt !!}</p>

            @if ($course->price > 0)
                <p class="mb-4">
                    <img src="{{ asset('images/education/price.svg') }}" class="image--education-include mr-3" alt="Extra">
                    @money($course->price)
                </p>
            @endif

            @if( $course->present()->url == "https://www.queridodinero.com/talleres/paquete-qdplay-3-cursos")
                <a href="{{ url('/qdplay') }}" class="btn btn-dark btn-pill btn-xl">@lang('More')</a>
            @else
                <a href="{{ $course->present()->url }}" class="btn btn-dark btn-pill btn-xl">@lang('More')</a>
            @endif
        </div>
    </div>
</div>
