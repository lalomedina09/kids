@extends('layouts.dashboard.admin')

<style>
    #app {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px 20px;
        background-color: #343a40 !important;
    }
</style>
@section('dashboard-content')


<div class="container shadow rounded mt-3 mb-3" style="background-color: #ffffff;">
    <br>
    @include('dashboard.quizzes.quizzes.partials._header',
                [
                    'subtitle' => 'Quizzes',
                    'subcategory' => false,
                    'categoryId' => 0
                ]
            )

    @include('partials.dashboard.messages')
        <h4 class="mt-4">Agregar pregunta al Quiz: {{ $quiz->title}}</h4>

        {!! Form::open([
                        'route' => 'dashboard.questions.store',
                        'method' => 'POST',
                        'id' => 'formQuestions',
                        'files' => true
                    ]) !!}

                    @include('dashboard.quizzes.questions.partials._form')

        {!! Form::close() !!}

        <h4>Lista de <b>{{ count($questions)}}</b> preguntas: </h4>
        <br>
    </div>

    @include('dashboard.quizzes.questions.partials._list',
            [
                //'categories' => $categories,
                'subcategory' => false
            ]
    )

@endsection
