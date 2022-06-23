@extends('layouts.app')

@section('content')

    @isset($featured)
        @include('partials.courses.carousel', ['featured' => $featured])
    @endisset

    <div class="container">
        @include('partials.courses.categories')

        <div class="mt-5 py-4">
            <div style="position: relative;">
                <h5 class="text-center text-uppercase text-bold education__title education__title--top education__title--danger">
                    {{ $category->present()->name }}
                </h5>
            </div>

            @forelse($category->courses as $course)
                @include('partials.courses.card', ['course' => $course])
            @empty
                <h3>Sin cursos</h3>
            @endforelse
        </div>
    </div>

@endsection
