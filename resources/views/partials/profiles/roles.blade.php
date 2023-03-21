<div id="{{ str_slug(__('Roles')) }}" class="tab-pane">

    <!-- Archivo para  botones dentro de la seccion-->
    @include('partials.profiles.components.btn-company')
    <hr>

    @if(count($companyRoles)>0)
        @include('partials.profiles.components.roles.table')
    @endif

    <!------------------------------------------->
    @if (count($branches)>0)
        @include('partials.profiles.components.roles.create')
    @else
        <!-- Entro aqui porque al menos existe una sucursal-->
        <span class="small text-dark">
            Para poder agregar un rol al debe existir una sucursal<br>
            <a href="#{{ str_slug(__('My Company')) }}"
            class="nav-item nav-link text-uppercase text-dark custom-f-s-small text-center"
            data-toggle="tab">@lang('My Company')</a>

            <a href="#{{ str_slug(__('Branches')) }}"
            class="nav-item nav-link text-uppercase text-dark custom-f-s-small text-center"
            data-toggle="tab">@lang('Branches')</a>
        </span>
    @endif
    <!---- --->
</div>
