@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.downloads.partials._header', ['subtitle' => 'Descargas » Todos'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Archivo</th>
                    <th>Liga</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Achivo</th>
                    <th>Liga</th>
                    <th>Creado</th>
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
                                <li>Tipo: {{ optional($download->payload)->mime_type }}</li>
                                <li>Tamaño: {{ optional($download->payload)->human_readable_size }}</li>
                            </ul>
                        </td>
                        <td class="small">
                            <a href="{{ $download->link }}" target="_blank">
                                {{ $download->link }}
                            </a>
                            <hr>
                            <a href="{{ separateLinkDonwload($download->link) }}" target="_blank">
                               {{ separateLinkDonwload($download->link) }}
                            </a>
                        </td>
                        <td class="small" data-order="{{ $download->created_at->timestamp }}">{{ $download->created_at }}</td>
                        <td class="small">
                            <a href="{{ route('dashboard.downloads.edit', $download->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.downloads.destroy', $download->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
