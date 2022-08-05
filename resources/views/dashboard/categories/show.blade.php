@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header',
                [
                    'subtitle' => 'Categorías',
                    'subcategory' => true,
                    'categoryId' => $category->id
                ]
            )
{{-- dd($category->name) ----}}
    @include('partials.dashboard.messages')

    <h4>
        Subcategorías {{ $category->present()->name }}
    </h4>
    @include('dashboard.categories.partials._table',
            [
                'categories' => $category->getManyChilds($category->id),
                'subcategory' => true
            ]
    )

@endsection
