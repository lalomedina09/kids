<style>
    .label {
        display: inline;
        padding: 0.2em 0.6em 0.3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
    }

    .label-success {
        background-color: #5cb85c;
    }
    /************************
    Estilos para aplicar a los inputs de tipo radio button
    ****************************/

    /****************************************************/
</style>
@php
    $quiz = $dataQuiz['qd_quiz'];
    $answers = $dataQuiz['qd_answers'];
    //dd($quiz, $answers);
@endphp
<section>
        <h1 class="font-weight-bold">
			Quiz "Veamos lo que aprendiste"
			<a href="#" onclick="return toggle_area('quiz-del-curso');">
				<img src="{{ asset('etapa1/2. visualizacion curso-13.png') }}" alt="" align="right" class="icon-30" />
			</a>

			<hr />
		</h1>

		<div class="row collapse" id="quiz-del-curso">
            <div class="col-md-12">
                {{--dd($quiz)--}}
                @if($answers != null)
                    @if (count($answers)>0)
                        @include('quiz.course.answers')
                    @else
                    {{-- dd('entonces vamos a responder el formulario') --}}
                        @include('quiz.course.form', array('quiz' => $quiz, 'answers' => $answers))
                    @endif

                @else
                    <h4 class="text-center font-weight-bold">En este momento el curso no cuenta con un Quiz</h4>
                    {{-- dd('No entro al proximo if porque tampoco hay un quiz para el curso') --}}

                @endif
            </div>
		</div>
		<hr />
</section>
