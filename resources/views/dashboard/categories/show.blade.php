@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header',
                [
                    'subtitle' => 'Categorías » '.$category->name,
                    'subcategory' => true
                ]
            )

    @include('partials.dashboard.messages')

    <h4>
        Subcategorías {{ $category->present()->name }}
    </h4>
    @include('dashboard.categories.partials._table',
            [
                'categories' => $category->getManyChilds($category->parent_id),
                'subcategory' => true
            ]
    )

@endsection
