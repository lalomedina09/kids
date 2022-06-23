@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.quotes.partials._header', ['subtitle' => 'Citas » Eliminados'])

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
                @foreach($quotes as $quote)
                    <tr>
                        <td>{{ $quote->title }}</td>
                        <td data-order="{{ $quote->deleted_at->timestamp }}">{{ $quote->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.quotes.restore', $quote->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.quotes.destroy', $quote->id, 'force']]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
