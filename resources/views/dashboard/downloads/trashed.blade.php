@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.courses.partials._header', ['subtitle' => 'Descargas » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descargable</th>
                    <th>Liga</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descargable</th>
                    <th>Liga</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($downloads as $download)
                    <tr>
                        <td class="small">{{ $download->name }}</td>
                        <td class="small">
                            {{ optional($download->payload)->file_name }}
                            <ul class="pl-3 mt-2">
                                <li>{{ optional($download->payload)->mime_type }}</li>
                                <li>{{ optional($download->payload)->human_readable_size }}</li>
                            </ul>
                        </td>
                        <td class="small"><a href="{{ $download->link }}" target="_blank">{{ $download->link }}</a></td>
                        <td class="small" data-order="{{ $download->deleted_at->timestamp }}">{{ $download->deleted_at }}</td>
                        <td class="small">
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.downloads.restore', $download->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.downloads.destroy', $download->id, 'force']]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
