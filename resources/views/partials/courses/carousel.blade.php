<div id="featured-courses" class="carousel slide" data-ride="carousel">
    @if($featured->count() > 1)
        <ol class="carousel-indicators">
            @for($i = 0; $i < $featured->count(); $i++)
                <li data-target="#fed-carousel" data-slide-to="{{ $i }}" @if($i == 0) class="active" @endif></li>
            @endfor
        </ol>

        <a class="carousel-control-prev" href="#featured-courses" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#featured-courses" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @endif

    <div class="carousel-inner">
        @foreach ($featured as $course)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                @include('partials.courses.featured', ['course' => $course])
            </div>
        @endforeach
    </div>
</div>
