@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.videos.partials._header', ['subtitle' => 'Videos » Todo'])

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
                @foreach($videos as $video)
                    <tr>
                        <td>
                            <a href="{{ route('videos.show', [$video->slug]) }}">
                                {{ $video->present()->title }}
                            </a>
                        </td>
                        <td>{{ $video->present()->category }}</td>
                        <td data-order="{{ optional($video->published_at)->timestamp }}">{{ $video->present()->published_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.videos.edit', $video->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.videos.destroy', $video->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
