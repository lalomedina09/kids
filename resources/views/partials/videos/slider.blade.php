<div class="articles-slider mb-5">
    <h3 class="home__title home__title--secondary">
        <a href="{{ $slider_title_url }}">{{ $slider_title }}</a>
    </h3>

    <div class="row">
        <div class="col flexslider slider">
            <ul class="slides">
                @foreach($videos as $media)
                    <li class="pos-rel">
                        @include('partials.videos.card', ['media' => $media, 'type' => $type])
                    </li>
                @endforeach
            </ul>

            <div class="slider-item">
                <a href="#" class="flex-prev slider-item__prev">
                    <img src="{{ asset('images/arrow-left.png') }}" alt="Prev">
                </a>

                <div class="d-none d-md-flex slider-item__bullets" data-delay="1600"></div>

                <a href="#" class="flex-next slider-item__next">
                    <img src="{{ asset('images/arrow-right.png') }}" alt="Next">
                </a>
            </div>
        </div>
    </div>
</div>
