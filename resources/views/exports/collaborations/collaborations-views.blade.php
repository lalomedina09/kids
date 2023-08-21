<table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left;">
    <thead>
        <tr>
            <th>Num</th>
            <th>Colaborador</th>
            <th>Usuario</th>
            <th>Curso</th>
            <th>Vistas</th>
        </tr>
    </thead>
    <tbody>
        @php $contador = 1; $total = 0; @endphp
        @foreach ($result as $item)
        <tr>
            <td style="text-transform: none;"><b>{{ $contador++ }}</b></td>
            <td style="text-transform: capitalize;">{{ $item->user }} {{ $item->last_name }}</td>
            <td style="text-transform: lowercase;">{{ $item->email }}</td>
            <td style="text-transform: capitalize;">{{ $item->name }}</td>
            <td style="text-align: center;"><b>{{ $item->total_views }}</b></td>
        </tr>
        @php $total += $item->total_views; @endphp
        @endforeach
    </tbody>
</table>
