@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header',
                [
                    'subtitle' => 'Categorías',
                    'subcategory' => false,
                    'categoryId' => 0
                ]
            )

    @include('partials.dashboard.messages')

    <h4>Categorías Principales</h4>

    @include('dashboard.categories.partials._table',
            [
                'categories' => $categories,
                'subcategory' => false
            ]
    )

@endsection
