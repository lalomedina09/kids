@extends('layouts.landing-v2-white')

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
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: false
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
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: false
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
            "{{ asset('/images/landing/retiro/photos/foto_1.png') }}",
            "{{ asset('/images/landing/retiro/photos/foto_2.png') }}",
            "{{ asset('/images/landing/retiro/photos/foto_3.png') }}"
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
        }

        // Llama a la función changeImage cada 10 segundos
        setInterval(changeImage, 5000);
    </script>
@endpush
