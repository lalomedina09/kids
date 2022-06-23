@if($loop->first || $loop->last)
    <div class="col-lg-6 col-12 text-center mb-4 animated bounceIn">
        <div class="image-background featured__content"
            @if($cover->hasMedia('featured_image')) style="background-image: url('{{ $cover->present()->featured_image(1080, 500, true) }}');" @endif>
            <div class="overlay" style="background-color: #{{ $cover->present()->color }};"></div>
            <a href="{{ ($cover->url) ?: '#' }}" target="_blank">
                <h2>{{ $cover->present()->title }}</h2>
                <span>@lang('More')</span>
            </a>
        </div>
    </div>
@else
    <div class="col-lg-3 col-12 text-center mb-4 animated bounceIn">
        <div class="image-background featured__content"
            @if($cover->hasMedia('featured_image')) style="background-image: url('{{ $cover->present()->featured_image(500, 500, true) }}');" @endif>
            <div class="overlay" style="background-color: #{{ $cover->present()->color }};"></div>
            <a href="{{ ($cover->url) ?: '#' }}" target="_blank">
                <h2>{{ $cover->present()->title }}</h2>
                <span>@lang('More')</span>
            </a>
        </div>
    </div>
@endif
