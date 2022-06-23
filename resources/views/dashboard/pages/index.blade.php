@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.pages.partials._header', ['subtitle' => 'Páginas » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Liga</th>
                    <th>Autenticación</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Liga</th>
                    <th>Autenticación</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->present()->title }}</td>
                        <td><a href="{{ route('pages.show', [$page->slug]) }}" target="_blank">{{ route('pages.show', [$page->slug]) }}</a></td>
                        <td>{{ ($page->auth) ? 'Sí' : 'No' }}</td>
                        <td data-order="{{ $page->created_at->timestamp }}">{{ $page->present()->created_at }}</td>
                        <td class="mt-3">
                            <a href="{{ route('dashboard.pages.edit', $page->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.pages.destroy', $page->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
