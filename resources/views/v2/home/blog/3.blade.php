<div class="col-md-3">
    <h3 class="section-title mb-4 font-akshar">Trends</h3>
    <!-- Trend 1 -->
    @foreach ($trendings as $trend)
        <a href="{{ route('articles.show', [$trend->slug]) }}" style="text-decoration: none;">
            <div class="mb-3">
                <p class="trend-category mb-3">
                    {{ $trend->category()->present()->name }}
                </p>
                <p class="trend-title mb-2">
                    {{ $trend->title }}
                </p>
            </div>
        </a>
        <hr style="border-top: 1px solid grey;">
    @endforeach
</div>
