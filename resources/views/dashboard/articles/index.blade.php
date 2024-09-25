@extends('layouts.dashboard.blog')
@push('styles-inline')
<style type="text/css">
    .container {
        max-width: 95% !important;
    }
</style>
@endpush
@section('dashboard-content')

    @include('dashboard.articles.partials._header', ['subtitle' => 'Artículos » Todo'])

    @include('partials.dashboard.messages')
    @php
    $site = "https://dear-money.com/articles/";
    @endphp
    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Categorías</th>
                    <th>Autor</th>
                    <th>Sitio</th>
                    <th>Actualizado</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Categorías</th>
                    <th>Autor</th>
                    <th>Sitio</th>
                    <th>Actualizado</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td class="small">
                            <span class="text-dark">{{ $article->present()->id }}</span>
                        </td>
                        <td class="small">
                            @if ($article->site == "dear-money.com")
                                <a href="{{ $site . $article->slug }}" target="_blank">
                                    <span class="text-primary">{{ $article->present()->title }}</span>
                                </a>
                            @else
                                <a href="{{ route('articles.show', [$article->slug]) }}" target="_blank">
                                    <span class="text-danger">{{ $article->present()->title }}</span>
                                </a>
                            @endif
                        </td>
                        <td class="small">
                            <ul class="p-2">
                                @foreach($article->categories as $category)
                                    <li>{{ $category->present()->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="small">{{ $article->author->full_name }}</td>
                        <td class="small">
                            @if ($article->site == "dear-money.com")
                                <span class="text-primary">dear-money.com</span>
                            @else
                                <span class="text-danger">queridodinero.com</span>
                            @endif
                        </td>
                        <td class="small" data-order="{{ optional($article->updated_at)->timestamp }}">{{ $article->present()->updated_at }}</td>
                        <td class="small" data-order="{{ optional($article->published_at)->timestamp }}">{{ $article->present()->published_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('dashboard.articles.advertising.show', $article->id) }}" class="btn btn-sm btn-outline-warning"
                                title="Administrar publicidad del articulo">
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </a>

                            {!! Link::delete('Quitar', ['route' => ['dashboard.articles.destroy', $article->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
