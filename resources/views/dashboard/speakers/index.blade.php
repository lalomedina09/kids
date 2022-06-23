@extends('layouts.dashboard.education')

@section('dashboard-content')

    @include('dashboard.speakers.partials._header', ['subtitle' => 'Expositores » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cursos</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Cursos</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($speakers as $speaker)
                    <tr>
                        <td>{{ $speaker->present()->name }}</td>
                        <td>{{ $speaker->courses->count() }}</td>
                        <td data-order="{{ $speaker->created_at->timestamp }}">{{ $speaker->present()->created_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.speakers.edit', $speaker->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.speakers.destroy', $speaker->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
