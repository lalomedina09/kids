<div class="row">
    <div class="col-md-7">
        <h5 class="text-center">Tus respuestas</h5>
        <div class="row">
            @php $count=1; @endphp
            @foreach ($answers as $answer)
                <div class="col-md-1">
                    @if ($answer->option->is_correct == 1)
                        <img src="{{ asset('etapa1/quiz/quiz-aprobado.png')}}" alt="Respuesta Correcta" width="35">
                    @else
                        <img src="{{ asset('etapa1/quiz/quiz-no-aprobado.png')}}" alt="Respuesta Incorrecta" width="35">
                    @endif
                </div>
                <div class="col-md-11">
                    <h5 class="font-weight-lighter">
                        <span style="background: linear-gradient(to right, #90d06b, #01dacb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            {{ $count++ }}.-
                        </span>
                        @if ($answer->question)
                            <span class="font-weight-bold">
                                {{ $answer->question->question }}
                            </span>
                        @endif
                        <br>
                        <span style="background: linear-gradient(to right, #90d06b, #01dacb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            R:
                        </span>
                        <b>@if ($answer->option)
                            {{ $answer->option->option }}
                            @endif
                        </b>
                    </h5>
                    <hr>
                </div>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="col-md-5">
        @if($user)
            <div class="row">
                @php
                    $avgQuiz = AvgQuizQdplay($quiz, $user, $course);

                @endphp

                <div class="col-md-6">
                    <h5 class="text-center">Tu resultado</h5>
                    <table class="table">
                        <tr>
                            <td class="font-weight-normal">Num de preguntas</td>
                            <td><b>{{ $avgQuiz['total']}}</b></td>
                        </tr>
                        <tr>
                            <td class="font-weight-normal">Correctas</td>
                            <td><b>{{ $avgQuiz['correct']}}</b></td>
                        </tr>
                        <tr>
                            <td class="font-weight-normal">Incorrectas</td>
                            <td><b>{{ $avgQuiz['incorrect']}}</b></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <br><br>
                    <img src="{{ $avgQuiz['img']}}" style="display: block;margin:auto;" width="130" alt="Quiz Realizado">
                </div>
                <div class="col-md-12">
                    <br>
                    <img src="{{ asset('etapa1/quiz/icon-quiz.png')}}" style="display: block;margin:auto;" width="80%" alt="Quiz Realizado">
                </div>
            </div>
        @endif
    </div>
</div>




