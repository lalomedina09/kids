<div id="{{ $type }}-carousel" class="carousel slide article-carousel" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @foreach($featured as $video)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                @include('partials.main.interactions', ['interactable' => $video, 'share_route' => $video->present()->url])

                <a href="{{ $video->present()->url }}" class="d-block">
                    <img class="image--videos-carousel mb-2 mb-md-4" src="{{ $video->present()->slider_image }}" alt="First slide">
                </a>
                <a href="{{ $video->present()->urlCategory }}">
                    <span class="article__category text-danger">{{ $video->present()->category }}</span>
                </a>
                <a href="{{ $video->present()->url }}" class="d-block">
                    <h2 class="mt-2 mt-md-3 mb-0">{{ $video->present()->title }}</h2>
                </a>
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#{{ $type }}-carousel" role="button" data-slide="prev">
        <img src="/images/arrow-left.png" alt="Arrow left">
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#{{ $type }}-carousel" role="button" data-slide="next">
        <img src="/images/arrow-right.png" alt="Arrow rigth">
        <span class="sr-only">Next</span>
    </a>
</div>
