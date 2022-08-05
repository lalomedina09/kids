@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', [
            'subtitle' => 'Categorías',
            'subcategory' => false,
            'categoryId' => 0
        ])

    @include('partials.dashboard.messages')

    <h4>Categorias desactivadas</h4>
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
                            {{--{!! Link::restore('Restablecer', ['route' => ['dashboard.categories.restore', $category->id]]) !!}--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div>


@endsection
