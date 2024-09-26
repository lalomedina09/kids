@extends('layouts.dashboard.blog')

@section('dashboard-content')

{{--@include('dashboard.social-post.components._header', ['subtitle' => 'Articulo » Publicidad'])--}}

@include('partials.dashboard.messages')

<div class="row">
    <div class="col-md-6">
        @if($advertising)
        <h6>
            Liga Destino:<br>
            <b style="word-wrap: break-word;">{{ $advertising->link }}</b>
        </h6>
        <br>
        <h6>
            Fecha de publicación:
            <b>{{ customDateSpanish($advertising->published_at) }}</b>
        </h6>
        <br>
        <h6>Fecha de expiración:
            <b>{{ customDateSpanish($advertising->published_at_expired) }}</b>
        </h6>
        <br>
        <h6>Imagen para escritorio</h6>
        <img src="{{ asset('storage/' . $advertising->cover_desktop) }}" alt="Imagen para escritorios" id="cover_desktop"
            class="img-fluid" style="max-width: 100%;" />
        <br><br><br>
        <h6>Imagen para móvil</h6>
        <img src="{{ asset('storage/' . $advertising->cover_movil) }}" alt="Imagen para movil" id="cover_movil"
            class="img-fluid" style="max-width: 100%;" />
        @else
        <h6>El articulo no tiene publicidad asignada</h6>
        @endif
    </div>
    <div class="col-md-6">
        <h5 class="text-center">
            @if(isset($advertising))
            Actualiza la
            @else
            Asigna
            @endif
            publicidad al articulo
        </h5>
        @if(isset($advertising))
        {!! Form::model($advertising, [
            'route' => ['dashboard.articles.advertising.update', $article->id],
            'method' => 'PUT', // Usamos PUT o PATCH para edición
            'enctype' => 'multipart/form-data',
            'class' => 'p-2'])
        !!}
            @include('dashboard.articles.advertising._form')
        @else
        {!! Form::open([
            'route' => ['dashboard.articles.advertising.store', $article->id],
            'method' => 'POST', // POST para crear nuevo registro
            'enctype' => 'multipart/form-data',
            'class' => 'p-2'])
        !!}
        @include('dashboard.articles.advertising._form')
        @endif

        <div class="form-group text-center">
            <input class="btn btn-primary" type="submit" value="{{ isset($advertising) ? __('Update') : __('Save') }}">
        </div>
        {!! Form::close() !!}

    </div>
</div>

@endsection
