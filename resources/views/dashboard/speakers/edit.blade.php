@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.speakers.partials._header', ['subtitle' => 'Expositores » Editar'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::model($speaker, ['route' => ['dashboard.speakers.update', $speaker->id], 'method' => 'PATCH', 'files' => true]) !!}

                @include('dashboard.speakers.partials._form', ['btn' => 'Actualizar'])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@stop
