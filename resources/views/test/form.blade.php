<div class="row">
    <div class="col-md-12">
        <h5 class="text-center">Pruebas | Responder Quiz</h5>
        <h5 class="text-center">{{ $quiz->title}}</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::open([
            'route' => 'test.quiz',
            'method' => 'POST',
            'id' => 'formResponseQuiz',
            ])
        !!}

        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @php $count = 1; @endphp

        @foreach ($quiz->questions as $question)
            <h5>{{ $count++ }}.- {{ $question->question }}</h5>
            <input type="hidden" name="question[]" value="{{ $question->id }}">

            @include('test.create.option')
            <hr>
        @endforeach

        <div class="col-md-12 text-center">
            <input type="submit" class="btn btn-danger" value="enviar">
        </div>
        {!! Form::close() !!}
    </div>
</div>
