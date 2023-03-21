<div class="row">
    <div class="col-md-6">
        <h5 class="text-danger text-uppercase custom-f-s-small mb-5">
            @lang('List Branches')
        </h5>
    </div>
    <div class="col-md-6 text-right">
        <a class="text-danger text-uppercase custom-f-s-small mb-5" href="#add-branch">
           Agregar <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
    </div>
</div>
{{-- entro a la condicion encontro al menos una sucursal--}}
<table class="table">
    <thead>
        <tr>
            <th scope="col" class="custom-f-s-small">#ID</th>
            <th scope="col" class="custom-f-s-small">Empresa</th>
            <th scope="col" class="custom-f-s-small">Sucursal</th>
            <th scope="col" class="custom-f-s-small">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @php $contador = 1; @endphp
        @foreach($branches as $branch)
            <tr>
                <th scope="row" class="custom-f-s-small">{{ $contador++ }}</th>
                <td class="custom-f-s-small">{{ $branch->company->name }}</td>
                <td class="custom-f-s-small">{{ $branch->name }}</td>
                <td class="custom-f-s-small">
                    <button class="btn btn-danger btn-pill custom-f-s-small btn-small" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="add-branch"></div>
