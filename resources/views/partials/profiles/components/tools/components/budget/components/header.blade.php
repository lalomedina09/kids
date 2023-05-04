<div class="row">
    <div class="col-md-12 mb-2">
        <a href="#{{ str_slug(__('Tools')) }}" class="custom-btn-link text-bold" data-toggle="tab">
            <img src="{{ asset('images/tools/return.png') }}" alt="Return" width="20">
                 Herramientas
        </a>
        <span class="text-bold"> | Presupuesto </span>
        <span class="text-right small"> Crea tu presupuesto basandote en el principio 50% / 30% / 20%</span>
    </div>
    <div class="col-md-4">
        <a href="#{{ str_slug(__('Section Entrances')) }}" data-toggle="tab" class="simple-border-bottom btn-a-style-none">
            <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Mensual">
            <span class="small text-bold">Visualización Mensual</span>
        </a>
    </div>
    <div class="col-md-3">
        <a href="#{{ str_slug(__('Calendar Budget')) }}" data-toggle="tab" class="btn-a-style-none">
            <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Calendario Anual">
            <span class="small text-bold">Visualización Anual</span>
        </a>
    </div>
    <div class="col-md-3">
        @include('partials.components.loading')
    </div>
</div>
