@extends('layouts.landing-v2-white')
{{--@extends('layouts.landing')--}}

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

{{-- Estilos css3- --}}
@push('styles')
    @include('landings.components.retiro.style')

    <!-- Estilos de Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Tema opcional de Slick Carousel (puedes omitirlo si no lo necesitas) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
@endpush

@push('styles-inline')
    <style>
        .form-control {
            background: #ffffff !important;
        }

        /* Estilo base para los dots */
        .slick-dots li button:before {
        font-size: 12px; /* Tamaño del punto */
        color: #f7dc4c; /* Color del punto */
        opacity: 1;
        }

        /* Cambiar el color del punto activo */
        .slick-dots li.slick-active button:before {
        color: #000; /* Color del punto activo */
        }

        /* Cambiar el tamaño de los dots */
        .slick-dots li {
        margin: 0 5px; /* Espacio entre los puntos */
        }

        /* Cambiar el tamaño del contenedor de los dots */
        .slick-dots {
        bottom: -30px; /* Ajusta la posición vertical de los dots */
        }

        /* Opcional: Cambiar el contenedor de los dots */
        .slick-dots {
        display: flex;
        justify-content: center; /* Centrar los dots */
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="container pt-0 pt-lg-4">
        <section>
            @include('landings.components.retiro.banner-and-form')
            <br>
        </section>
        <section>
            @include('landings.components.retiro.clients')
        </section>
        <section>
            <br>
            @include('landings.components.retiro.data_course')
        </section>
        <section>
            <br>
            @include('landings.components.retiro.benefits')
        </section>
    </div>
    <section style="background-color: #f7dc4c">
        @include('landings.components.retiro.request')
    </section>
@endsection

{{-- Scrips --}}
@push('scripts')
    <!-- JavaScript de Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
@endpush

@push('scripts-inline')
    <script>
        $(document).ready(function() {
            //Carrusel de clientes
            $('.clients-carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 6,
                slidesToScroll: 6,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 830,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: false,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
            //Termina carrusel de clientes

            //Carrusel de beneficios
            $('.benefits-carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 830,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: false,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
            //Termina carrusel de beneficios
        });
    </script>

    <script>
        // Array con las rutas de las imágenes
        var imageSources = [
            "{{ asset('/images/landing/retiro/photos/1.png') }}",
            "{{ asset('/images/landing/retiro/photos/2.png') }}",
            "{{ asset('/images/landing/retiro/photos/3.png') }}"
        ];

        // Índice de la imagen actual
        var currentIndex = 0;

        // Función para cambiar la imagen cada 10 segundos
        function changeImage() {
            // Incrementa el índice de la imagen
            currentIndex++;
            // Si el índice supera el límite, vuelve al principio
            if (currentIndex >= imageSources.length) {
                currentIndex = 0;
            }
            // Actualiza el src de la imagen
            document.getElementById('dynamic-image').src = imageSources[currentIndex];
            console.log('se actualiza foto');
            console.log('Resolución: ' + window.screen.width + ' x ' + window.screen.height);
        }

        // Llama a la función changeImage cada 10 segundos
        setInterval(changeImage, 5000);

        ///////
        $('.btn.btn-dark').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $('#form-request').offset().top
            }, 1000); // El número 1000 representa el tiempo de animación en milisegundos
        });

    </script>
@endpush
