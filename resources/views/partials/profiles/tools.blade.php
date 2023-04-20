<div id="{{ str_slug(__('Tools')) }}" class="tab-pane">
    {{--
    aqui van las herrtamienasidasub
    <!-- Archivo para  botones dentro de la seccion-->
    @include('partials.profiles.components.btn-company')
    <hr>
    @include('partials.profiles.components.companies.form')
    --}}
    <div class="row">
        <div class="col-md-6" class="text-bold">
           <img src="{{ asset('images/tools/return.png') }}" alt="Return" width="20">
           Herramientas
           <img src="{{ asset('images/tools/icon-tools.png') }}" alt="Icon Tools" width="30">
           <br><br>
           <span class="small">Utiliza estas funciones que tenemos para ti.</span>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/tools/ilustracion.png') }}" width="60%" style="float: right;" alt="Ilustracion herramientas">
        </div>
    </div>

    <hr style="background: rgb(128,202,86);
    background: linear-gradient(90deg, rgba(128,202,86,1) 35%, rgba(11,218,195,1) 100%);">

    <div class="row">
        <div class="col-md-4">
            <a href="#{{ str_slug(__('Tool-budget')) }}">
                <img src="{{ asset('images/tools/presupuesto.png') }}" width="80%" alt="Tools Budget">
            </a>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tools/hipotecario-2.png') }}" width="80%" alt="Tools 2">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tools/auto-2.png') }}" width="80%" alt="Tools 3">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <img src="{{ asset('images/tools/retiro-2.png') }}" width="80%" alt="Tools 4">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tools/impuestos-2.png') }}" width="80%" alt="Tools 5">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tools/intereses-comp-2.png') }}" width="80%" alt="Tools 6">
        </div>
    </div>
</div>
