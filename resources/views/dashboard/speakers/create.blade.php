@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.speakers.partials._header', ['subtitle' => 'Expositores » Nuevo'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(['route' => 'dashboard.speakers.store', 'method' => 'POST', 'files' => true]) !!}

                @include('dashboard.speakers.partials._form')

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
