@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.covers.partials._header', ['subtitle' => 'Cubiertas » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 0, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($shown as $cover)
                    <tr>
                        <td>Cubierta #{{ $cover->position }}: {{ $cover->present()->title }}</td>
                        <td>
                            <a href="{{ route('dashboard.covers.edit', $cover->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.covers.destroy', $cover->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 0, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($hidden as $cover)
                    <tr>
                        <td>{{ $cover->present()->title }}</td>
                        <td>
                            <a href="{{ route('dashboard.covers.edit', $cover->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.covers.destroy', $cover->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
