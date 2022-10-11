<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo Empresa</th>
        <th>Celular</th>
        <th>Empresa</th>
        <th>Formulario</th>
        <th>Año de registro</th>
        <th>Mes de registro</th>
        <th>Día de registro</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->last_name }}</td>
            <td>{{ $lead->mail_corporate }}</td>
            <td>{{ $lead->movil }}</td>
            <td>{{ $lead->company }}</td>
            <td>{{ $lead->form }}</td>
            <td>{!! date('Y', strtotime($lead->created_at)) !!}</td>
            <td>{!! date('M', strtotime($lead->created_at)) !!}</td>
            <td>{!! date('d', strtotime($lead->created_at)) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
