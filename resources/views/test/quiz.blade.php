@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

@include('preQdplay.experiment-qdplay.components.index.style')

@section('content')
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
    </style>
    <!-----------------------------------------------------------------
    ------------------------------------------------------------------>
    <div class="container">
        @if (count($answers)>0)
            @include('test.show.answers')
        @else
            @include('test.form')
        @endif
    </div>
    <!-----------------------------------------------------------------
    ------------------------------------------------------------------>
    <section>
		<h1 class="font-weight-bold">
			Sobre tu expositor
			<a href="#" onclick="return toggle_area('sobre-tu-expositor');">
				<img src="{{ asset('etapa1/2. visualizacion curso-13.png') }}" alt="" align="right" class="icon-30" />
			</a>

			<hr />
		</h1>

		<div class="row collapse" id="sobre-tu-expositor">

		</div>

		<hr />
	</section>
    <!-----------------------------------------------------------------
        -------------------------------------------------------------->
@endsection

