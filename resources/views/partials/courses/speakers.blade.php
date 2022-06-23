<div class="col-12 education__exhibitor">
    @foreach($speakers as $speaker)
        @if($loop->index%2)
            <div class="videos__featured d-md-flex pt-0 pt-md-5">
                <div class="image--education-featured image-background education__exhibitors--image" style="background-image: url('{{ $speaker->present()->primary_image }}');"></div>
                <div class="categories__featured-container pos-rel">
                    <div class="rich__featured-content">
                        <h2 class="text-bold text-uppercase">{{ $speaker->present()->name }}</h2>
                        <span class="text-danger text-uppercase text-xsmall">{!! $speaker->present()->job !!}</span>
                        <hr class="separator--danger">
                        {!! $speaker->present()->bio !!}
                    </div>
                </div>
            </div>
        @else
            <div class="videos__primary d-md-flex mb-5 pt-5">
                <div class="image--education-featured image-background education__exhibitors--image" style="background-image: url('{{ $speaker->present()->primary_image }}');"></div>
                <div class="categories__featured-container pos-rel">
                    <div class="rich__featured-content">
                        <h2 class="text-bold text-uppercase">{{ $speaker->present()->name }}</h2>
                        <div class="text-danger text-uppercase text-xsmall">{!! $speaker->present()->job !!}</div>
                        <hr class="separator--danger">
                        {!! $speaker->present()->bio !!}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
