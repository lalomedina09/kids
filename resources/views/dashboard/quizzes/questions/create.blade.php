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

    <h4>Agregar pregunta al Quiz: {{ $quiz->title}}</h4>

    {!! Form::open([
                    'route' => 'dashboard.questions.store',
                    'method' => 'POST',
                    'id' => 'formQuestions',
                    'files' => true
                ]) !!}

                @include('dashboard.quizzes.questions.partials._form')

    {!! Form::close() !!}

    <h4>Lista de <b>{{ count($questions)}}</b> preguntas: </h4>

    @include('dashboard.quizzes.questions.partials._list',
            [
                //'categories' => $categories,
                'subcategory' => false
            ]
    )

@endsection
