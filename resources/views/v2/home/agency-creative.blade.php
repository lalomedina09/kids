@extends('layouts.app-v2-redesign')

<title>Agencia Creativa | Querido Dinero</title>

@section('content')

    @include('v2.home.agency.banner')

    @include('v2.home.agency.features')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <h2 class="text-dark font-akshar text-center font-weight-bold display-4">
                    Hagamos equipo para llevar las finanzas al siguiente nivel
                </h2>
                <br><br>
                @include('v2.home.agency.form')
            </div>
        </div>
    </div>

@endsection
