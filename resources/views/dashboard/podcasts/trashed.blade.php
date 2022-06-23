@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.podcasts.partials._header', ['subtitle' => 'Podcasts » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse($podcasts as $podcast)
                    <tr>
                        <td>{{ $podcast->present()->title }}</td>
                        <td>{{ $podcast->present()->category }}</td>
                        <td data-order="{{ $podcast->deleted_at->timestamp }}">{{ $podcast->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.podcasts.restore', $podcast->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.podcasts.destroy', $podcast->id, 'force']]) !!}
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">No hay podcasts</td>
                    </tr>
                @endforelse
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@stop
