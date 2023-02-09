@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="education__title education__title--bottom text-danger text-center text-bold pos-rel mb-5">Contáctanos</h1>
            <p class="text-center mb-5">¡Ponte en contacto con nosotros y tendrás noticias nuestras muy pronto!</p>
        </div>

        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="mb-5">
                    <h5 class="text-bold pos-rel contact__title">Dirección:</h5>
                    <p><span class="text-bold">Ciudad de México: </span>{{ config('money.address.cdmx') }}</p>
                    <p><span class="text-bold">Monterrey: </span>{{ config('money.address.mty') }}</p>
                </div>

                <div class="mb-5">
                    <h5 class="text-bold pos-rel contact__title">Por teléfono:</h5>
                    @if(false)
                    <p><span class="text-bold">Ciudad de México: </span>{{ config('money.phone.cdmx') }}</p>
                    @endif
                    <p><span class="text-bold">Monterrey: </span>{{ config('money.phone.mty') }}</p>
                </div>

                <div class="mb-5">
                    <h5 class="text-bold pos-rel contact__title">Por correo electrónico:</h5>
                    <p>
                        <a href="mailto:{{ config('money.email') }}" class="link-primary">{{ config('money.email') }}</a>
                    </p>
                </div>

                <div class="mb-5">
                    <h5 class="text-bold pos-rel contact__title">¡Síguenos en redes sociales!</h5>
                    <ul class="list-unstyled list-inline d-flex align-items-center">
                        <li class="list-inline-item single__social-item">
                            <a href="{{ config('money.url.facebook') }}" target="_blank" rel="noopener noreferrer">
                                <img src="/images/facebook.svg" alt="Facebook" class="single__social-logo">
                            </a>
                        </li>
                        <li class="list-inline-item single__social-item ml-2">
                            <a href="{{ config('money.url.twitter') }}" target="_blank" rel="noopener noreferrer">
                                <img src="/images/twitter.svg" alt="Twitter" class="single__social-logo">
                            </a>
                        </li>
                        <li class="list-inline-item single__social-item ml-2">
                            <a href="{{ config('money.url.youtube') }}" target="_blank" rel="noopener noreferrer">
                                <img src="/images/youtube.svg" alt="Youtube" class="single__social-logo">
                            </a>
                        </li>
                        <li class="list-inline-item single__social-item ml-2">
                            <a href="{{ config('money.url.instagram') }}" target="_blank" rel="noopener noreferrer">
                                <img src="/images/instagram.svg" alt="Instagram" class="single__social-logo">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
