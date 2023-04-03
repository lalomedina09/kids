@include('dashboard.categories.partials._header', [
            'subtitle' => 'Quizzes',
            'categoryId' => 0
        ])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open([
                    'route' => 'dashboard.quizzes.store',
                    'method' => 'POST',
                    'id' => 'formQuiz',
                    'files' => true
                ]) !!}

                @include('dashboard.quizzes.quizzes.partials._form',
                    [
                        'btn' => 'Crear',
                        'action' => 'create',
                        //'parent_id' => $parent_id
                    ])

            {!! Form::close() !!}

        </div><!-- .col-lg-12 -->
    </div><!-- .row -->
