<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="text-center font-weight-bold">
            Iniciemos el Quiz
            {{ $quiz->title}}
        </h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::open([
            'route' => 'quiz.course.save',
            'method' => 'POST',
            'id' => 'formResponseQuiz',
            ])
        !!}

        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @php $count = 1; @endphp

        @foreach ($quiz->questions as $question)
            <h5 class="font-weight-normal">{{ $count++ }}.- {{ $question->question }}</h5>
            <input type="hidden" name="question[]" value="{{ $question->id }}">
            @include('quiz.course.partials._form_option')
            <!-- <hr style="border-top: 2px solid #e0e9e2;">-->
        @endforeach

        <div class="col-md-12 text-center">
            <input type="submit" class="btn btn-rounded bg-green-blue text-white font-weight-bold text-initial" value="enviar">
        </div>
        {!! Form::close() !!}
    </div>
</div>
