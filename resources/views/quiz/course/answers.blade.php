<div class="row">
    <div class="col-md-7">
        <h5 class="text-left">Tus respuestas</h5>
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
                </div>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-left">Tu resultado</h5>
                <table>
                    <tr>
                        <td>Num de preguntas</td>
                        <td><b>10</b></td>
                    </tr>
                    <tr>
                        <td>Correctas</td>
                        <td><b>6</b></td>
                    </tr>
                    <tr>
                        <td>Incorrectas</td>
                        <td><b>6</b></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('etapa1/quiz/quiz-realizado.png')}}" style="display: block;margin:auto;" width="90" alt="Quiz Realizado">
            </div>
        </div>
    </div>
</div>



