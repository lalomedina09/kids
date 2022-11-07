@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

@include('preQdplay.experiment-qdplay.components.index.style')

@section('content')

    <!-- estilo utilizado para las landings relacionadas a qdplay -->
    <link href="{{asset('index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('index_files/app.css')}}" rel="stylesheet">
    @include('landings.components.register-qdplay-personas-fisicas.styles')

    @include('landings.components.register-qdplay-personas-fisicas.banner')

    @include('landings.components.register-qdplay-personas-fisicas.benefits')

    @include('landings.components.register-qdplay-personas-fisicas.ilustration')

@endsection

<script type="text/javascript" src="{{asset('index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/etapa1.js.descarga')}}"></script>
