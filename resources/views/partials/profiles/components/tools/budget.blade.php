<div id="{{ str_slug(__('Tool-budget')) }}" class="tab-pane">
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

    <hr>

    <div>
       pantalla de movimientos, reportes, etc.
    </div>
</div>
