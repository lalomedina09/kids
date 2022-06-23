@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.videos.partials._header', ['subtitle' => 'Videos » Eliminados'])

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
                @forelse($videos as $video)
                    <tr>
                        <td>{{ $video->present()->title }}</td>
                        <td>{{ $video->present()->category }}</td>
                        <td data-order="{{ $video->deleted_at->timestamp }}">{{ $video->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.videos.restore', $video->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.videos.destroy', $video->id, 'force']]) !!}
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">No hay videos</td>
                    </tr>
                @endforelse
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
