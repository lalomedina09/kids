@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.articles.partials._header', ['subtitle' => 'Artículos » Eliminados'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 3, "desc" ]]'>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categorías</th>
                    <th>Autor</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Título</th>
                    <th>Categorías</th>
                    <th>Autor</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td class="small">{{ $article->present()->title }}</td>
                        <td class="small">
                            <ul class="p-2">
                                @foreach($article->categories as $category)
                                    <li>{{ $category->present()->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="small">{{ $article->author->full_name }}</td>
                        <td class="small" data-order="{{ $article->deleted_at->timestamp }}">{{ $article->present()->deleted_at }}</td>
                        <td>
                            {!! Link::restore('Restablecer', ['route' => ['dashboard.articles.restore', $article->id]]) !!}
                            {!! Link::delete('Eliminar', ['route' => ['dashboard.articles.destroy', $article->id, 'force']]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
