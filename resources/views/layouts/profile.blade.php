@extends('layouts.app')

@section('content')

    <div class="profile__container">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="image-background mx-auto custom-filter-gray" style="background-image: url({{ $user->present()->author_photo }});"></div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="align-vertical">
                        <p class="small text-white text-underline text-uppercase mb-3">@lang('About')</p>

                        <h1 class="text-bold text-danger mb-3">{{ $user->present()->fullname }}</h1>

                        @if ($user->hasMeta('blog', 'job'))
                            <p class="small text-bold text-white text-uppercase mb-3">{{ $user->getMeta('blog', 'job') }}</p>
                        @endif

                        @if ($user->hasMeta('blog', 'bio'))
                            <div class="text-white text-justify text-small mb-4">{!! $user->getMeta('blog', 'bio', ['clean', 'purify', 'linkify']) !!}</div>
                        @endif

                        <p>
                            @if ($user->hasMeta('blog', 'facebook'))
                                <a href="{{ $user->getMeta('blog', 'facebook') }}" class="text-danger mr-4" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-facebook"></span>
                                </a>
                            @endif
                            @if ($user->hasMeta('blog', 'twitter'))
                                <a href="{{ $user->getMeta('blog', 'twitter') }}" class="text-danger mr-4" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-twitter"></span>
                                </a>
                            @endif
                            @if ($user->hasMeta('blog', 'instagram'))
                                <a href="{{ $user->getMeta('blog', 'instagram') }}" class="text-danger mr-4" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-instagram"></span>
                                </a>
                            @endif
                            @if ($user->hasMeta('blog', 'youtube'))
                                <a href="{{ $user->getMeta('blog', 'youtube') }}" class="text-danger mr-4" target="_blank" rel="noopener noreferrer">
                                    <span class="fa fa-2x fa-youtube-play"></span>
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @include('partials.profiles.navbar')

        <div class="tab-content">
            @yield('profile-content')
        </div>
    </div>

@endsection
