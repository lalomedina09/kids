<div class="col-md-3">
    <h3 class="section-title mb-4 font-akshar">Trends</h3>
    <!-- Trend 1 -->
    @foreach ($trendings as $trend)
        <div class="mb-3">
            <a href="{{ route('articles.by.tag', [$trend->category()->present()->slug]) }}" style="text-decoration: none;">
                <p class="trend-category mb-3">
                    {{ $trend->category()->present()->name }}
                </p>
            </a>
            <a href="{{ route('articles.show', [$trend->slug]) }}" style="text-decoration: none;">
                <p class="trend-title mb-2">
                    {{ $trend->title }}
                </p>
            </a>
        </div>
        <hr style="border-top: 1px solid grey;">
    @endforeach
</div>
