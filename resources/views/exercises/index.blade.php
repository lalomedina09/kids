@extends('layouts.page')

@section('page')

<h3 class="home__title home__title--secondary mt-5">
    Sección de ejercicios
</h3>

<div class="nav-scroller mb-5">
    <nav class="nav">
        @foreach ($exercises as $e)
            @if (property_exists($e, 'exercises') && !empty($e->exercises))
                <a href="#{{ str_slug($e->name) }}"
                    class="nav-link text-uppercase link-light link--underline link--underline--danger {{ ($loop->first) ? 'active' : '' }}"
                    data-toggle="tab">
                    {{ $e->name }}
                </a>
            @endif
        @endforeach
    </nav>
</div>

<div class="tab-content">
    @foreach ($exercises as $e)
        @if (property_exists($e, 'exercises') && !empty($e->exercises))
            <div id="{{ str_slug($e->name) }}"
                class="featured tab-pane {{ ($loop->first) ? 'active' : '' }}">
                <div class="row flex-row mb-5 featured__container">
                    @foreach($e->exercises as $exercise)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4 animated bounceIn">
                            <div class="image-background featured__content"
                                style="background-image: url('{{ $exercise->image }}');">
                                <a href="{{ route($exercise->route) }}">
                                    <h2>{{ $exercise->name }}</h2>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>

@endsection
