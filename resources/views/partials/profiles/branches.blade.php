<div id="{{ str_slug(__('Branches')) }}" class="tab-pane">

    <!-- Archivo para  botones dentro de la seccion-->
    @include('partials.profiles.components.btn-company')
    <hr>

    <!--- Table Data--->
    @if(count($branches)>0)
        @include('partials.profiles.components.branches.table')
    @endif

    <h5 class="text-danger text-uppercase custom-f-s-small mb-3 mt-5">@lang('Add') @lang('Branch')</h5>

    @if (!is_null($company))
        <!--- Entro aqui porque la empresa si existe- entonces podemos agregar la sucursal-->
        @include('partials.profiles.components.branches.create')
    @else
        <!-- Entro aqui porque la empresa no existe y debemos indicar que primero agreguen la empresa-->
        <span class="small text-dark">
            Para poder agregar una sucursal, primero agrega tu empresa <br>
            <a href="#{{ str_slug(__('My Company')) }}"
            class="nav-item nav-link text-uppercase text-dark custom-f-s-small text-center"
            data-toggle="tab">@lang('My Company')</a>
        </span>
    @endif
</div>
