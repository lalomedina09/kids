<div id="{{ str_slug(__('Tool-budget')) }}" class="tab-pane">
    <div class="row">
        <div class="col-md-12 mb-2">
            <a href="#{{ str_slug(__('Tools')) }}" class="custom-btn-link text-bold" data-toggle="tab">
                <img src="{{ asset('images/tools/return.png') }}" alt="Return" width="20">
                     Herramientas
            </a>
            <span class="text-bold"> | Presupuesto </span>
            <span class="text-right small"> Crea tu presupuesto basandote en el principio 50% / 30% / 20%</span>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Mensual">
            <span class="small text-bold">Visualización Mensual</span>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Anual">
            <span class="small text-bold">Visualización Anual</span>
        </div>
    </div>

    <hr class="hr-gradient" style="margin-bottom: 1px;">

    <div class="row">
       @include('partials.profiles.components.tools.components.budget.view-month.header')
    </div>

    <div class="row">
        @include('partials.profiles.components.tools.components.budget.view-month.bodyCategories')
     </div>

</div>
