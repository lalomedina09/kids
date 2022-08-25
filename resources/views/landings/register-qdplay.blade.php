@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

@include('preQdplay.experiment-qdplay.components.index.style')

@section('content')

    <style type="text/css">
		.row {
			margin: 0;
		}

		.side-background {
			padding: 5% 10% 0;
			background-image: url('/images/qdplay/registro-empresas/bg-movil.png'),
				linear-gradient(to right, #90d06b, #01dacb);
			background-size: contain;
			background-repeat: no-repeat;
			background-color: #00dbcd;
			background-position-y: bottom;
			height: 820px;
		}

		.font-resize {
			font-size: 1rem;
		}
        @media (min-width: 320px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-movil.png');
            }
            .banner-text-dinamic{
                text-align: center !important;
            }
            .d-movil-show{
                display: block !important;
            }
            .img-align-left{
                margin-left: -5%;
            }
            .movil-form-center{

            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
        }
        @media (min-width: 360px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-movil.png');
            }
            .banner-text-dinamic{
                text-align: center !important;
            }
            .d-movil-show{
                display: block !important;
            }
            .img-align-left{
                margin-left: -5%;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
        }
		@media (min-width: 450px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-movil.png');
            }
			.side-background {
				height: 920px;
			}
            .banner-text-dinamic{
                text-align: center !important;
            }
            .d-movil-show{
                display: none !important;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

        @media (max-width: 540px) {
            .d-movil-show{
                display: block !important;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
        }

		@media (min-width: 600px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				height: 1020px;
			}
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

		@media (min-width: 700px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				height: 1050px;
			}
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

		@media (min-width: 740px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				background-size: cover;
				height: 1100px;
			}
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

        @media (max-width: 799.98px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-movil.png');
             min-height: 500px;
            }
            .d-movil-show{
                display: block !important;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
        }

		@media (min-width: 800px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-movil.png');
            }
			.side-background {
				background-size: contain;
				height: 950px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

		@media (min-width: 1000px) {
            .banner-reg-qdplay{
             background-image: url('/images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				background-size: contain;
				height: 1000px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

		@media (min-width: 1200px) {
            .banner-reg-qdplay{
             background-image: url('images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				height: 1050px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 10px !important;
            }
		}

		/*@media (min-width: 1200px) {
            .banner-reg-qdplay{
             background-image: url('images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				height: 1100px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 20px !important;
            }
		}*/

		@media (min-width: 1480px) {
            .banner-reg-qdplay{
             background-image: url('images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				background-size: contain;
				height: 1150px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .padding-custom-regis-qdp {
                padding: 20px !important;
            }

		}

		@media (min-width: 1600px) {
            .banner-reg-qdplay{
             background-image: url('images/qdplay/registro-empresas/bg-web.png');
            }
			.side-background {
				background-size: cover;
				height: 1300px;
			}
            .banner-text-dinamic{
                text-align: left !important;
            }
            .d-movil-show{
                display: none;
            }
            .font-size-2-5x {
                font-size: 4rem !important;
            }

            .padding-custom-regis-qdp {
                padding: 20px !important;
            }
		}

		.form-control {
			background-color: #ededed;
		}

		.form-control::placeholder {
			color: #333;
		}
	</style>
    <!-- estilo utilizado para las landings relacionadas a qdplay -->
    <link href="{{asset('index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('index_files/app.css')}}" rel="stylesheet">

    @include('landings.components.register-qdplay.banner')

    @include('landings.components.register-qdplay.benefits')

    @include('landings.components.register-qdplay.companies')

    @include('landings.components.register-qdplay.ilustration')

@endsection

<script type="text/javascript" src="{{asset('index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/etapa1.js.descarga')}}"></script>
