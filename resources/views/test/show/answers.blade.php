<div class="row">
    <div class="col-md-12">
        <h5 class="text-center">Tus respuestas</h5>
        <h5 class="text-center">{{ $quiz->title}}</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @php $count=1; @endphp
        @foreach ($answers as $answer)

            <h5>Quiz:
                @if ($answer->quiz)
                    {{ $answer->quiz->title }}
                @endif
            </h5>

            <h5>{{ $count++ }}.-
                @if ($answer->question)
                    Pregunta: {{ $answer->question->question }}
                @endif
            </h5>

            <h5>Respuesta:
                @if ($answer->option)
                    {{ $answer->option->option }}
                @endif
            </h5>
            <h5>Status:
                @if ($answer->option->is_correct == 1)
                    <span class="label label-success">Correcta</span>
                @else
                     Incorrecta
                @endif
            </h5>
            <hr>
        @endforeach
    </div>
</div>
