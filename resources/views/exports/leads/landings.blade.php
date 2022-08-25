<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo Empresa</th>
        <th>Celular</th>
        <th>Empresa</th>
        <th>Formulario</th>
        <th>Fecha Registro</th>
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
            <td>{{ $lead->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
