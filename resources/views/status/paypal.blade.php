@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h2 class="education__title education__title--bottom text-danger text-center text-bold pos-rel mb-5">
                ¡Sorry!
            </h2>
            <p class="text-center mb-5">
                Lo sentimos! El pago a través de PayPal no se pudo realizar.
            </p>
            <a href="{{ url('/')}}" class="btn btn-danger btn-lg btn-pill">
                Ir a pagina de inicio
            </a>
        </div>

        <!--<div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="mb-5">
                    <h5 class="text-bold pos-rel contact__title">Dirección:</h5>
                    <p><span class="text-bold">Ciudad de México: </span>{{ config('money.address.cdmx') }}</p>
                    <p><span class="text-bold">Monterrey: </span>{{ config('money.address.mty') }}</p>
                </div>
            </div>
        </div>-->
    </div>

@endsection
