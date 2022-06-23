@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.covers.partials._header', ['subtitle' => 'Artículos » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 1, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($covers as $cover)
                    <tr>
                        <td>{{ $cover->present()->title }}</td>
                        <td data-order="{{ $cover->deleted_at->timestamp }}">{{ $cover->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.covers.restore', $cover->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.covers.destroy', $cover->id, 'force']]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
