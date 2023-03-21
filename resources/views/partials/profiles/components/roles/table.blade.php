@if(count($companyRoles)>0)
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-danger text-uppercase custom-f-s-small mb-5">
                @lang('List Roles')
            </h5>
        </div>
        <div class="col-md-6 text-right">
            <a class="text-danger text-uppercase custom-f-s-small mb-5" href="#add-rol">
            Agregar <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    {{-- Entro a la condicion encontro al menos un rol--}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="custom-f-s-small">#ID</th>
                <th scope="col" class="custom-f-s-small">Rol</th>
                <th scope="col" class="custom-f-s-small">Empresa</th>
                <th scope="col" class="custom-f-s-small">Sucursal</th>
                <th scope="col" class="custom-f-s-small">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $contador = 1; @endphp
            @foreach($companyRoles as $rol)
                <tr @if(!is_null($rol->deleted_at)) class="table-danger"  @endif >
                    <th scope="row" class="custom-f-s-small">{{ $contador++ }}</th>
                    <td class="custom-f-s-small">{{ $rol->name }}</td>
                    <td class="custom-f-s-small">{{ $rol->company->name }}</td>
                    <td class="custom-f-s-small">{{ $rol->branch->name }}</td>
                    <td class="custom-f-s-small">
                        @if(is_null($rol->deleted_at))
                        <button class="btn btn-danger btn-pill custom-f-s-small btn-small" type="button">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="add-rol"></div>
@else
    {{-- entro al else porque vamos a mostrar msj para que agregeue una sucursal el administrador--}}
    <span class="small text-dark">
        Paso 1 Tener al menos una empresa <br><br>
        Paso 2 Tener al menos una sucursal <br><br>
        Paso 3 Agrega un rol para desbloquear funciones<br>
    </span>
@endif
<!---- --->
