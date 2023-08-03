@extends('layouts.app')

@php
$i_am_logged = $user instanceof App\Models\User;
@endphp

@push('styles')
<link href="{{ url('css/etapa1.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet" />
<link href="{{ asset('css/qdplay-sliders.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<script type="text/javascript" defer src="{{ asset('js-new/qdplay/sliders-index.js') }}?v={{ (rand(1,500)) }}"></script>
@endpush

@push('styles-inline')
@include('qd:qdplay::home.partials.index._style')
<style type="text/css">
	.form-control {
		padding: 1.5em 1em;
		color: rgb(14, 13, 13);
		border: 2px solid #6a6a6c;
	}

    ul.square-list li {
        list-style: none;
    }

    ul.square-list li::before {
    content: "\25A0";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
    color: #5cb85c; /* Change the color */
    font-weight: bold; /* If you want it to be bold */
    display: inline-block; /* Needed to add space between the bullet and the text */
    width: 1em; /* Also needed for space (tweak if needed) */
    margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    .w-80{
        width: 80%;
    }
</style>
@endpush

@section('content')

<div class="container pt-0 pt-lg-4">
    <section class="text-center pb-3">
		<img src="{{ asset('etapa1/landings/resuelve/logos-qdplay-resuelve.png') }}" alt="Logo QD Play y Resuelve" width="300">
	</section>
	<section>
		<div class="row">
			<div class="col-md-6 col-12">
				<img src="{{ asset('etapa1/landings/resuelve/ilustracion.png') }}" alt="Logo ilustracion izquierdo" class="w-80" />
			</div>
			<div class="col-md-6 col-12 text-center text-md-left">
                <h1 class="text-normal">
                    Obtén un <span class="text-bold">15</span>% de
                </h1>
                <h1 class="text-normal title-underline title-underline-b title-underline-bl">
                    descuento en <span class=" text-green-blue text-bold">QD Play</span>
                </h1>
                <br>
                <p class="text-bold">
                    Aprende con los cursos online hechos por expertos financieros
                </p>

				<form class="row" method="post" action="{{ route('register.resuelve.signup.save') }}">
                    @csrf
					<div class="col-sm-6 col-12 p-1">
						<input type="text" name="name" placeholder="*Nombre" class="form-control" />
					</div>
					<div class="col-sm-6 col-12 p-1">
						<input type="text" name="last_name" placeholder="*Apellido" class="form-control" />
					</div>
					<div class="col-12 p-1">
						<input type="email" name="email" placeholder="*Correo Electrónico" class="form-control" />
					</div>
					<div class="col-12 p-1">
						<input type="password" name="password" id="pass" placeholder="*Contraseña" class="form-control" />
					</div>
					<label class="col-12 p-1" style="font-size: 1rem;">
						<input type="checkbox" name="showpass" id="showpass" /> Mostrar contraseña
					</label>

					<div class="col-sm-6 col-12 p-1">
						<button class="btn bg-green-blue btn-rounded text-white text-initial text-bold w-100">
                            Comenzar a aprender</button>
					</div>
                    <div class="col-sm-6 col-12 p-1">
						{{--<select placeholder="Elige un plan" class="w-100 form-control">

						</select>--}}
					</div>
				</form>



				<div>
                    <p class="">
                        <span class="text-bold">Al registrarse estás aceptando nuestros </span>
					    <b><a href="{{ route('terms') }}" class="text-blue">Términos y Condiciones</a></b>.
                        <br>
                        <span>* El 15% de descuento solo aplica en la membresia mensual.</span>
                    </p>
				</div>

			</div>
		</div>

		<hr style="margin-top: 0px;"/>
	</section>

	<section>
		<div class="row my-5">
			<div class="col-md-6 col-12 text-bold">
				<div class="row">
					<div class="col-6 text-right"><img src="{{ asset('etapa1/landings/v3/Asset 12-min.png') }}" alt="" width="200" /></div>
					<div class="col-6 text-bold font-size-xl">Mejora tu relación con tu dinero</div>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<ul class="square-list">
					<li>Aprende a administrar tu dinero</li>
					<li>Practica lo que aprendes con ejercicios y repasa con lecturas</li>
					<li>Hay un curso para ti, desde nivel principiante hasta avanzado</li>
					<li>Recomendaciones de cursos según tus intereses</li>
				</ul>
			</div>
		</div>
	</section>
</div>

<div style="background-color: #333335;">
	<div class="container text-white text-center py-4">
		<h1 class="text-white title-underline title-underline-b font-weight-normal">
			Sin importar tu conocimiento,<br />
			<b>hay un amplia gama de cursos para ti</b>
		</h1>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-12 my-5">
				<img src="{{ asset('etapa1/landings/v3/Asset 17-min.png') }}" alt="" width="150" />
				<div class="text-bold my-4">Finanzas Personales y en Pareja</div>
				<div>Toma decisiones financieras acertadas, ya sea que quieras salir de deudas, terminar la quincena con dinero o aumentar tus ahorros.</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12 my-5">
				<img src="{{ asset('etapa1/landings/v3/Asset 16-min.png') }}" alt="" width="150" />
				<div class="text-bold my-4">Inversiones<br />&nbsp;</div>
				<div>Comienza a invertir de manera sencilla, conoce los productos financieros ideales para ti.</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12 my-5">
				<img src="{{ asset('etapa1/landings/v3/Asset 15-min.png') }}" alt="" width="150" />
				<div class="text-bold my-4">Fiscal</div>
				<div>Aprende el funcionamiento de los impuestos en México.</div>
			</div>
			<div class="col-lg-3 col-md-6 col-12 my-5">
				<img src="{{ asset('etapa1/landings/v3/Asset 14-min.png') }}" alt="" width="150" />
				<div class="text-bold my-4">Emprendimiento y Pymes</div>
				<div>Eleva tus ventas o incrementa ganancias. Descubre herramientas básicas para tu negocio.</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ url('js/etapa1.js') }}"></script>
@endpush

@push('scripts-inline')
<script type="text/javascript">
	var pass = document.getElementById('pass');
	var showpass = document.getElementById('showpass');
	showpass.onchange = function() {
		pass.type = showpass.checked ? 'text' : 'password';
	}
</script>
@endpush
