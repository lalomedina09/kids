@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $course->id }}'],
                content_category: '{{ $course->category->present()->name }}',
                content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                content_type: 'course'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>

        <script id="fbq-track-InitiateCheckout">
            (function () {
                if (!window.fbq) return;
                var btns = document.getElementsByClassName('btn-checkout');
                if (btns.length <= 0) return;
                for (var b = 0; b < btns.length; b++) {
                    var $btn = btns[b];
                    $btn.addEventListener('click', function (e) {
                        fbq('track', 'InitiateCheckout', {
                            content_ids: ['{{ $course->id }}'],
                            content_category: '{{ $course->category->present()->name }}',
                            content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                            content_type: 'course',
                            currency: 'MXN',
                            num_items: 1
                        });
                    });
                }
            }());
            document.getElementById('fbq-track-InitiateCheckout').remove();
        </script>
    @endpush
@endif

<style type="text/css">

        .postheader {
            background-image: url('index_files/experimento/pantalla-principal-movil.png');
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
            margin-top: 100px;
            left: 0;
            background-color: #80ca56;
            background-image: url("index_files/1. pantalla principal imagenes-03-1.png");
            background-position-y: center;
            background-position-x: right;
            background-repeat: no-repeat;
            border-radius: 0 1000em 1000em 0;
            width: 100%;
            height: 550px;
        }

        .expositor-padding {
            padding-right: 20%;
            height: 550px;
        }

        .expositor-photo {
            height: 290px;
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
            background-image: url('index_files/Billeteca_pantalla principal FINAL/1. pantalla principal imagenes-05-1.png');
            background-repeat: no-repeat;
            background-position: top left;
            min-height: 2.5em;
        }

        .title-underline-br::before {
            margin-right: 0;
        }

        .prefooter {
            background-image: url('index_files/1. pantalla principal imagenes-12. pantalla principal imagenes-12.png'), url('index_files/1. pantalla principal imagenes-13. pantalla principal imagenes-13.png');
            background-position: left bottom, right bottom;
            background-size: 50%;
            background-repeat: no-repeat;
            min-height: 600px;
        }

        .prefooter .btn {
            max-width: 300px;
            padding: 0.1em 0;
        }

        @media (min-width: 600px) {
            .postheader {
                min-height: 1080px;
            }

            .prefooter {
                padding-top: 0;
            }
        }

        @media (min-width: 800px) {
            .expositor-bg {
                width: 60%;
                margin-top: 0;
            }

            .postheader {
                min-height: 570px;
            }

            .img-portada-video{
                width: 330px;

            }
        }

        @media (min-width: 1000px) {
            .postheader {
                background-image: url('index_files/experimento/pantalla-principal-qdplay.png');
                background-size: cover;

                min-height: 750px;
            }

            .prefooter {
                padding: 5em 11em;
                background-size: contain;
            }
        }

        @media (min-width: 1300px) {
            .postheader {

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
    <link href="{{asset('index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('index_files/app.css')}}" rel="stylesheet">


    @include('preQdplay.experiment-qdplay.components.index.banner')

    <div class="backgroud-gray">
        @include('preQdplay.experiment-qdplay.components.index.benefits')

        <section>
            <div class="container" >
                @include('preQdplay.experiment-qdplay.components.index.video-renta')

                @include('preQdplay.experiment-qdplay.components.index.video-pareja')

                @include('preQdplay.experiment-qdplay.components.index.video-impuestos')
            </div>
        </section>
    </div>

    @include('preQdplay.experiment-qdplay.components.index.what-include')

    @auth
        @if ($buy == false)
            @include('preQdplay.components.checkout')

            @push('scripts')
                <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
            @endpush
        @endif
    @endauth
@endsection

<script type="text/javascript" src="{{asset('index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/etapa1.js.descarga')}}"></script>
