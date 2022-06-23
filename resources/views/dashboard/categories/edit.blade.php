@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', ['subtitle' => 'Categorías » Editar'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::model($category, ['route' => ['dashboard.categories.update', $category->id], 'method' => 'PATCH', 'files' => true]) !!}

                @include('dashboard.categories.partials._form', ['btn' => 'Actualizar'])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
