@extends('layouts.app')

@section('content')

    @isset($featured)
        @include('partials.courses.carousel', ['featured' => $featured])
    @endisset

    <div class="container">
        @include('partials.courses.categories')

        @foreach($categories as $category)
            @unless($category->courses->isEmpty())
                <div class="mt-5 py-4">
                    <div style="position: relative;">
                        <h5 class="text-center text-uppercase text-bold education__title education__title--top education__title--danger">{{ $category->present()->name }}</h5>
                    </div>

                    @foreach($category->courses as $course)
                        @include('partials.courses.card', ['course' => $course])
                    @endforeach

                    <div class="mt-5 text-center">
                        <a href="{{ route('courses.category.index', [$category->slug]) }}" class="btn btn-link text-danger btn-xl">@lang('More')</a>
                    </div>
                </div>
            @endunless
        @endforeach
    </div>
@endsection
