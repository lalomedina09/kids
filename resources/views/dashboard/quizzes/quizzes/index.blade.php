@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.quizzes.quizzes.partials._header',
                [
                    'subtitle' => 'Quizzes',
                    'subcategory' => false,
                    'categoryId' => 0
                ]
            )

    @include('partials.dashboard.messages')

    <h4>Lista de Quizzes</h4>

    @include('dashboard.quizzes.quizzes.partials._table',
            [
                //'categories' => $categories,
                'subcategory' => false
            ]
    )

@endsection
