@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.videoCategories.partials._header', ['subtitle' => 'Categorías » Nuevo'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(['route' => 'dashboard.video.categories.store', 'method' => 'POST', 'files' => true]) !!}

                @include('dashboard.videoCategories.partials._form')

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
