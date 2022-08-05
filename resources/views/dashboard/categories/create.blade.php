@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', [
            'subtitle' => 'Categorías » Nuevo',
            'categoryId' => 0
        ])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open([
                    'route' => 'dashboard.categories.store',
                    'method' => 'POST',
                    'id' => 'formCategory',
                    'files' => true
                ]) !!}

                @include('dashboard.categories.partials._form',
                    [
                        'btn' => 'Crear',
                        'action' => 'create',
                    ])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
