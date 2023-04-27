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
           <!--<img src="{{ asset('images/tools/return.png') }}" alt="Return" width="20">-->
           Herramientas
           <img src="{{ asset('images/tools/icon-tools.png') }}" alt="Icon Tools" width="30">
           <br><br>
           <span class="small">Utiliza estas funciones que tenemos para ti.</span>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/tools/ilustracion.png') }}" width="40%" style="float: right;" alt="Ilustracion herramientas">
        </div>
    </div>
    <hr class="hr-gradient">


    <div class="row">
        <div class="col-md-4">
            <div class="tool-container">
                <a href="#{{ str_slug(__('Section Entrances')) }}" data-toggle="tab">
                    <img src="{{ asset('images/tools/presupuesto.png') }}" width="80%" alt="Tools Budget">
                </a>
                <!--<div class="texto-encima">Texto</div>-->
                <!--<div class="tools-text-center">PRÓXIMAMENTE</div>-->
            </div>
            <p class="text-center">Presupuesto</p>
        </div>
        <div class="col-md-4">
            <div class="tool-container">
                <img src="{{ asset('images/tools/hipotecario-2.png') }}" width="80%" alt="Tools 2">
                <!--<div class="texto-encima">Texto</div>-->
                <div class="tools-text-center">PRÓXIMAMENTE</div>
            </div>
            <p class="text-center">Hipotecario</p>
        </div>
        <div class="col-md-4">
            <div class="tool-container">
                <img src="{{ asset('images/tools/auto-2.png') }}" width="80%" alt="Tools 3">
                <!--<div class="texto-encima">Texto</div>-->
                <div class="tools-text-center">PRÓXIMAMENTE</div>
            </div>
            <p class="text-center">Automotriz</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="tool-container">
                <img src="{{ asset('images/tools/retiro-2.png') }}" width="80%" alt="Tools 4">
                <!--<div class="texto-encima">Texto</div>-->
                <div class="tools-text-center">PRÓXIMAMENTE</div>
            </div>
            <p class="text-center">Retiro</p>
        </div>
        <div class="col-md-4">
            <div class="tool-container">
                <img src="{{ asset('images/tools/impuestos-2.png') }}" width="80%" alt="Tools 5">
                <!--<div class="texto-encima">Texto</div>-->
                <div class="tools-text-center">PRÓXIMAMENTE</div>
            </div>
            <p class="text-center">Impuestos</p>
        </div>
        <div class="col-md-4">
            <div class="tool-container">
                <img src="{{ asset('images/tools/intereses-comp-2.png') }}" width="80%" alt="Tools 6">
                <!--<div class="texto-encima">Texto</div>-->
                <div class="tools-text-center">PRÓXIMAMENTE</div>
            </div>
            <p class="text-center">Interés compuesto</p>
        </div>
    </div>

    <!-- Botones dentro de tab de herramientas-->
    @include('partials.profiles.components.tools.components.budget.components.modal-add-move')
    @include('partials.profiles.components.tools.components.budget.components.modal-moves')
    @include('partials.profiles.components.tools.components.budget.components.modal-zoom')

</div>

@include('partials.profiles.components.tools.components.budget.entrances')

@include('partials.profiles.components.tools.components.budget.exits')

@include('partials.profiles.components.tools.components.budget.movements')

@include('partials.profiles.components.tools.components.budget.view-year.calendar')

@include('partials.profiles.components.tools.components.budget.view-year.report')


