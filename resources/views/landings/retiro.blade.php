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
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

        });
    </script>
@endpush
