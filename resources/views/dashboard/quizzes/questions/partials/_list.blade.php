@php $count = 1; @endphp
@foreach ($questions as $question)

    <div class="container shadow rounded mt-3 mb-3">
        <br>
        <h5>{{ $count++ }}.- {{ $question->question }}</h5> <br>
        <div class="row">
            <div class="col-md-12">
                {{--{!! Form::open([
                    'route' => 'dashboard.questions.store',
                    'method' => 'POST',
                    'id' => 'formQuestions',
                    'files' => true
                ]) !!}



                {!! Form::close() !!}--}}
                @include('dashboard.quizzes.options._create')
            </div>
        </div>
        <br><br>
        @include('dashboard.quizzes.options._list')
    </div>

@endforeach
