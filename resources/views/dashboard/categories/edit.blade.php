@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', [
            'subtitle' => 'Categorías',
            'categoryId' => 0
        ])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::model($category, [
                    'route' => ['dashboard.categories.update', $category->id],
                    'method' => 'PATCH',
                    'id' => 'formCategory',
                    'files' => true
                    ]) !!}

                @include('dashboard.categories.partials._form',
                    [
                        'btn' => 'Actualizar',
                        'action' => 'update',
                        'parent_id' => $parent_id,
                    ])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->

@endsection
