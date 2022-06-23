@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.speakers.partials._header', ['subtitle' => 'Expositores » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cursos</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Cursos</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse($speakers as $speaker)
                    <tr>
                        <td>{{ $speaker->present()->name }}</td>
                        <td>{{ $speaker->courses->count() }}</td>
                        <td data-order="{{ $speaker->deleted_at->timestamp }}">{{ $speaker->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.speakers.restore', $speaker->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.speakers.destroy', $speaker->id, 'force']]) !!}
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">No hay expositores</td>
                    </tr>
                @endforelse
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
