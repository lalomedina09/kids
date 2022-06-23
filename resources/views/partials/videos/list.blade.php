<article class="videos box pt-0">
    <div class="row">
        @foreach($list as $media)
            <div class="col-md-4 col-sm-12 videos--item mb-5">
                @include('partials.videos.card', ['media' => $media, 'type' => $type])
            </div>
        @endforeach
    </div>
</article>
