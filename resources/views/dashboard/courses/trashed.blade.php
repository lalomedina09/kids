@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.courses.partials._header', ['subtitle' => 'Cursos » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Inicio</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Inicio</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td>{{ $course->present()->title }}</td>
                        <td>{{ $course->present()->category }}</td>
                        <td>{{ $course->present()->event_date }}</td>
                        <td data-order="{{ $course->deleted_at->timestamp }}">{{ $course->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.courses.restore', $course->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.courses.destroy', $course->id, 'force']]) !!}
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">No hay courses</td>
                    </tr>
                @endforelse
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
