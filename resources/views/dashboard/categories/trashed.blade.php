@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', ['subtitle' => 'Categorías » Eliminados'])

    @include('partials.dashboard.messages')

    <h4>Categorias de artículos</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 1, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->present()->name }}</td>
                        <td>{{ $category->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.categories.restore', $category->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div>

    <h4>Categorias de videos y podcasts</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 1, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($videoCategories as $category)
                    <tr>
                        <td>{{ $category->present()->name }}</td>
                        <td>{{ $category->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.video.categories.restore', $category->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
