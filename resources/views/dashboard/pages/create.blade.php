@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.pages.partials._header', ['subtitle' => 'Páginas » Crear'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(['route' => ['dashboard.pages.store'], 'method' => 'POST']) !!}

                @include('dashboard.pages.partials._form')

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
