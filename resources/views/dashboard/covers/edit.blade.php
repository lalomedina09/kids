@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.covers.partials._header', ['subtitle' => 'Cubierta » Editar'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::model($cover, ['route' => ['dashboard.covers.update', $cover->id], 'method' => 'PATCH', 'files' => true]) !!}

                @include('dashboard.covers.partials._form', ['btn' => 'Actualizar'])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
