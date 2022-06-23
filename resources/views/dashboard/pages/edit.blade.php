@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.pages.partials._header', ['subtitle' => 'Páginas » Editar'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(['route' => ['dashboard.pages.update', $page->id], 'method' => 'PATCH', 'files' => true]) !!}

                @include('dashboard.pages.partials._form')

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
