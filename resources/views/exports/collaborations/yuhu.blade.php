<table class="table table-hover table-bordered" data-order='[[ 0, "asc" ]]'>
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('Registro')</th>
            <th>@lang('User ID')</th>
            <th>@lang('Full name')</th>
            <th>@lang('Email')</th>
        </tr>
    </thead>

    <tbody>
        @php $counter = 1; @endphp
        @foreach($data as $item)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $item->fechaRegistroUsuario }}</td>
                <td>{{ $item->collaborator_id }}</td>
                <td>{{ $item->nameColaborador }}</td>
                <td>{{ $item->correoColaborador }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
