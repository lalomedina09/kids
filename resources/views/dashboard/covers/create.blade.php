@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.covers.partials._header', ['subtitle' => 'Artículos » Nuevo'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(['route' => 'dashboard.covers.store', 'method' => 'POST', 'files' => true]) !!}

                @include('dashboard.covers.partials._form')

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
