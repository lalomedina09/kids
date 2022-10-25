@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.social-post.components._header', ['subtitle' => 'Posts » Todos'])

    @include('partials.dashboard.messages')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" data-order='[[ 2, "desc" ]]'>
            <thead>
                <tr>
                    <th>Red Social</th>
                    <th>Sitio</th>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="small">
                            {{ $post->id }} - {{ $post->red_social }}
                        </td>
                        <td class="small">
                            {{ $post->site }}
                        </td>
                        <td class="small">
                            {{ $post->type }} > {{ $post->code }}
                        </td>
                        <td class="small">
                            {{ $post->description }}
                        </td>
                        <td class="small" data-order="{{ optional($post->updated_at)->timestamp }}">{{ $post->updated_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.social-post.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">@lang('Edit')</a>
                            {!! Link::delete('Remover', ['route' => ['dashboard.social-post.destroy', $post->id]]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
