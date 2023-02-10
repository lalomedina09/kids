@extends('layouts.profile')

@section('profile-content')

    <div class="tab-pane active" id="profile-articles" role="tabpanel">
        <h3 class="home__title home__title--danger">
            {{ $user->present()->fullname }}
            <span class="small text-muted">({{ $user->articles->count() }})</span>
        </h3>

        <div class="row mb-4">
            @foreach($user->articles as $article)
                @if ($article->site == env('SITE_ARTICLES', "queridodinero.com"))
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-5">
                        @include('partials.articles.card', ['article' => $article])
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
