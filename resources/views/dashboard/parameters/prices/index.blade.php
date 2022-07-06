@extends('layouts.dashboard.parameters')

@section('dashboard-content')

    @include('dashboard.parameters.partials._header', ['subtitle' => 'Parametros » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <p>aqui mostramos el valor minimo y maximo de precios para calculo de $ en rojo</p>
    </div>

@endsection
