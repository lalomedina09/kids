@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.pages.partials._header', ['subtitle' => 'Páginas » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Liga</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Liga</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->present()->title }}</td>
                        <td>{{ route('pages.show', [$page->slug]) }}</td>
                        <td data-order="{{ $page->deleted_at->timestamp }}">{{ $page->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.pages.restore', $page->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.pages.destroy', $page->id, 'force']]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
