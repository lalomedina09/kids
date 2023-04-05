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
    /****************************************************/
    .content-input{
        position: relative;
        margin-bottom: 30px;
        padding:5px 0 5px 60px; /* Damos un padding de 60px para posicionar el elemento <i> en este espacio*/
        display: block;
    }

    /* Estas reglas se aplicarán a todos las elementos i después de cualquier input*/
    .content-input input + i{
    background: #f0f0f0;
    border:2px solid rgba(0,0,0,0.2);
    position: absolute;
    left: 0;
    top: 0;
    }

    /* Estas reglas se aplicarán a todos los i despues de un input de tipo radio*/
    .content-input input[type=radio] + i{
    height: 30px;
    width: 30px;
    border-radius: 100%;
    left: 15px;
    }
    /****************************************************/
</style>
@php
$quiz = $dataQuiz['qd_quiz'];
$answers = $dataQuiz['qd_answers'];
//dd(count($dataQuiz['qd_answers']));
@endphp
<section>
        <h1 class="font-weight-bold">
			Quiz del curso @if($quiz) {{ $quiz->title }} @endif
			<a href="#" onclick="return toggle_area('quiz-del-curso');">
				<img src="{{ asset('etapa1/2. visualizacion curso-13.png') }}" alt="" align="right" class="icon-30" />
			</a>

			<hr />
		</h1>

		<div class="row collapse" id="quiz-del-curso">
            <div class="col-md-12">
                @if($answers != null)

                <!---Primera validacion no encontro un quiz y no existe colecction
                    para poder filtrar y buscar respuestas--->
                    @if(count($answers > 0))
                    <!-- Segunda validacion revisar si ya contesto el Quiz ---->
                        {{dd('entro aqui porque ya contesto el Quiz')}}
                    @else
                        {{dd('entro al form para responder el quiz')}}
                        <!-- entro aqui es porque el
                        usuario debe contestar el quiz-->
                        @include('test.form')

                    @endif
                @endif
            </div>
		</div>
		<hr />
</section>
