@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')

    @endpush
@endif

<style type="text/css">
        .postheader {
            background-image: url('/index_files/experimento/pantalla-principal-movil.png');
            background-size: 100%;
            background-position-y: bottom;
            background-color: #cdd1d4;
            background-repeat: no-repeat;
            min-height: 1280px;
        }

        .title1 {
            font-size: 3.5rem;
        }
        .expositor-bg {
            position: absolute;
            left: 0;
            background-color: #80ca56;
            background-image: url("/index_files/experimento/fondo-asesor.png");
            background-position-y: center;
            background-position-x: right;
            background-repeat: no-repeat;
            border-radius: 0 1000em 1000em 0;
            width: 100%;
            min-height: 575px;
        }

        .expositor-photo {
            margin-top: 50px;
            margin-bottom: 50px;
            height: 475px;
        }

        @media (min-width: 800px) {
            .expositor-photo {
                margin-right: 50px;
            }
        }

        @media (min-width: 1000px) {
            .expositor-bg {
                width: 50%;
            }
        }

        .carousel-inner {
            padding: 1em 0;
            max-width: 350px;
        }

        .star-list {
            padding-left: 0;
        }

        .star-list li {
            padding-left: 60px;
            margin-bottom: 1em;
            list-style: none;
            background-image: url('/index_files/Billeteca_pantalla principal FINAL/1. pantalla principal imagenes-05-1.png');
            background-repeat: no-repeat;
            background-position: top left;
            min-height: 2.5em;
        }

        .title-underline-br::before {
            margin-right: 0;
        }

        .prefooter {
            background-image: url('/index_files/1. pantalla principal imagenes-12. pantalla principal imagenes-12.png'), url('/index_files/1. pantalla principal imagenes-13. pantalla principal imagenes-13.png');
            background-position: left bottom, right bottom;
            background-size: 50%;
            background-repeat: no-repeat;
            min-height: 600px;
        }

        .prefooter .btn {
            max-width: 300px;
            padding: 0.1em 0;
        }

        @media (min-width: 360px) {
        .video-main-responsive
            {
                width:270;
                height:180;
            }
        }

        @media (min-width: 576px) {
            .video-main-responsive
            {
                width:500;
                height:250;
            }
        }
        @media (min-width: 768px) {
            .video-main-responsive
            {
                width:500;
                height:250;
            }
        }

        @media (min-width: 600px) {
            .postheader {
                min-height: 1080px;
            }

            .prefooter {
                padding-top: 0;
            }
            .video-main-responsive
            {
                width:540;
                height:260;
            }
        }

        @media (min-width: 800px) {
            .expositor-bg {
                width: 45%;
                margin-top: 0;
            }

            .postheader {
                min-height: 570px;
            }

            .img-portada-video{
                width: 330px;

            }

            .video-main-responsive
            {
                width:540;
                height:260;
            }
        }

        @media (min-width: 1000px) {
            .postheader {
                background-image: url('/index_files/experimento/pantalla-principal-qdplay.png');
                background-size: cover;
                /*min-height: 1080px;*/
                /*Actualice el min height porque la imagen no se veia completa*/
                min-height: 750px;
            }

            .prefooter {
                padding: 5em 11em;
                background-size: contain;
            }

            .video-main-responsive
            {
                width:640;
                height:360;
            }
        }

        @media (min-width: 1300px) {
            .postheader {
                /*Actualice el min height porque la imagen no se veia completa*/
                /*min-height: 1080px;*/
                min-height: 750px;
            }

            .title1 {
                font-size: 4rem;
            }

            .prefooter {
                padding: 8em 11em;
                height: 760px;
            }

            .prefooter .btn {
                max-width: none;
                padding: 0.5em;
            }
            .img-portada-video{
                width: 500px;
            }

            .video-main-responsive
            {
                width:640;
                height:360;
            }
        }

        .flexslider3 {
            position: relative;
            padding: 0 40px;
            max-width: 500px;
        }

        .flexslider3 .slider-item {
            position: absolute;
            left: 0;
            top: 270px;
            right: 0;
            width: 100%;
            justify-content: space-between;
            z-index: 1;
        }

        .flexslider3 .slider-item__bullets {
            position: absolute;
            left: 0;
            top: 315px;
        }


    .margin-lateral {
        margin-left: 10%;
        margin-right: 10%;
    }


</style>
@section('content')
    <link href="{{asset('/index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('/index_files/app.css')}}" rel="stylesheet">


    {{-- --}}
    <div class="container">
        <div style="margin-left: 5%; margin-right: 5%;">

            @include('preQdplay.experiment-qdplay.components.show.video-principal')
            {{--@include('preQdplay.experiment-qdplay.components.show.video-principal')--}}

            @include('preQdplay.experiment-qdplay.components.show.temario')

            @include('preQdplay.experiment-qdplay.components.show.lo-que-aprenderas')

            @include('preQdplay.experiment-qdplay.components.show.expositor')

            @include('preQdplay.experiment-qdplay.components.show.descargables')

            {{--@include('preQdplay.experiment-qdplay.components.show.include_package')--}}
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-center mb-5 mt-4">
                        @if ($statusBuy == 0)
                            <a href="@auth # @else #login-modal @endauth"
                                class="btn btn-pill bg-green-blue text-white font-size-md font-weight-normal font-weight-bold text-transform-none btn-rounded"
                                @auth data-fullmodal="#modal-checkout" @else data-toggle="modal" @endauth>
                                Compra el paquete <span class="text-black">por sólo $299 MXN</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- --}}
    @auth
        @if ($statusBuy == 0)
            @include('preQdplay.components.checkout')

            @push('scripts')
                <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
            @endpush
        @endif
    @endauth

@endsection

<script type="text/javascript" src="{{asset('/index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('/index_files/etapa1.js.descarga')}}"></script>
<script type="text/javascript">
    var mas_lecciones = document.getElementById('mas-lecciones');
    var mas_comentarios = document.getElementById('mas-comentarios');

    function toggle_area(area_id) {
      let area = $(document.getElementById(area_id));
      if (area.hasClass('collapse'))
        area.removeClass('collapse');
      else
        area.addClass('collapse');
      return false;
    }

    function toggle_mas_lecciones() {
      if (mas_lecciones == null)
        return false;

      mas_lecciones.className = (mas_lecciones.className == 'collapse' ? '' : 'collapse');
      return false;
    }

    function toggle_mas_comentarios() {
      if (mas_comentarios == null)
        return false;

      mas_comentarios.className = (mas_comentarios.className == 'collapse' ? '' : 'collapse');
      return false;
    }
  </script>
