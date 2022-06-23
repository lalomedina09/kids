@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.courses.partials._header', ['subtitle' => 'Cursos » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>
                            <a href="{{ route('courses.show', [$course->slug]) }}">
                                {{ $course->present()->title }}
                            </a>
                        </td>
                        <td>{{ $course->present()->category }}</td>
                        <td data-order="{{ optional($course->published_at)->timestamp }}">{{ $course->present()->published_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.courses.destroy', $course->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
