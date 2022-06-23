@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.podcasts.partials._header', ['subtitle' => 'Podcasts » Todo'])

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
                @foreach($podcasts as $podcast)
                    <tr>
                        <td>
                            <a href="{{ route('podcasts.show', [$podcast->slug]) }}">
                                {{ $podcast->present()->title }}
                            </a>
                        </td>
                        <td>{{ $podcast->present()->category }}</td>
                        <td data-order="{{ optional($podcast->published_at)->timestamp }}">{{ $podcast->present()->published_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.podcasts.edit', $podcast->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.podcasts.destroy', $podcast->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
