@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.categories.partials._header', ['subtitle' => 'Categorías » Todo'])

    @include('partials.dashboard.messages')

    <h4>Categorías de artículos</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Artículos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Artículos</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->present()->name }}</td>
                        <td>{{ number_format($category->articles->count()) }}</td>
                        <td>
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.categories.destroy', $category->id]]) !!}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table><!-- .table -->
    </div>

    <h4>Categorías de videos y podcasts</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Artículos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Artículos</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach($videoCategories as $category)
                    <tr>
                        <td>{{ $category->present()->name }}</td>
                        <td>{{ number_format($category->videos->count() + $category->podcasts->count()) }}</td>
                        <td>
                            <a href="{{ route('dashboard.video.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.video.categories.destroy', $category->id]]) !!}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table><!-- .table -->
    </div><!-- .table-responsive -->

@endsection
