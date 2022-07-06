@extends('layouts.dashboard.parameters')

@section('dashboard-content')

    @include('dashboard.parameters.partials._header', ['subtitle' => 'Parametros » Precios'])

    @include('partials.dashboard.messages')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h6>
                    Rango de precios para obtener rating
                </h6>
            </div>
            <div class="col-md-3">
                <p>
                    Costo base: ${{ $priceRating->_lft }} MXN
                </p>
            </div>
            <div class="col-md-3">
                <p>
                    Costo maximo: ${{ $priceRating->_rgt }} MXN
                </p>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPriceEditRating">
                    <i class="lni lni-pencil-alt"></i> Actualizar
                </a>
            </div>
        </div>
    </div>
    @include('dashboard.parameters.prices.rating.modal-edit')
@endsection
