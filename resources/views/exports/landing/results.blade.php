<table>
    <thead>
    <tr>
        @foreach ($columns->fields as $field => $item)
            <th>{{ $field }}</th>
        @endforeach
        <th>Estado</th>
        <th>Fecha Registro</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            @foreach ($result->fields as $field => $value)
                @if ($field == "Tipo")
                @else
                    <td>{{ $value }}</td>
                @endif
            @endforeach
            <td>
                @if ($result->synced)
                    <span class="badge badge-success">Sincronizado</span>
                @else
                    <span class="badge badge-danger">No sincronizado</span>
                @endif
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

