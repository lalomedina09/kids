@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.articles.partials._header', ['subtitle' => 'Artículos » Todo'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
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
                            <a href="{{ route('articles.show', [$article->slug]) }}" target="_blank">
                                {{ $article->present()->title }}
                            </a>
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
                            <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.articles.destroy', $article->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
