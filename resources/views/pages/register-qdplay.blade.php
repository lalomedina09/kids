@extends('layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

@include('preQdplay.experiment-qdplay.components.index.style')

@section('content')
    <link href="{{asset('index_files/etapa1.css')}}" rel="stylesheet">
    <link href="{{asset('index_files/app.css')}}" rel="stylesheet">
    <!--------------
        ** REFERENCIA:http://127.0.0.1/Repos-aws-vector/qdplay-virtual/inicio-empresas.php **
    -------------->

    {{--@include('preQdplay.experiment-qdplay.components.index.banner')--}}

    <!--<div class="backgroud-gray">
        @include('preQdplay.experiment-qdplay.components.index.benefits')

        <section>
            <div class="container" >
                @include('preQdplay.experiment-qdplay.components.index.video-renta')

                @include('preQdplay.experiment-qdplay.components.index.video-pareja')

                @include('preQdplay.experiment-qdplay.components.index.video-impuestos')
            </div>
        </section>
    </div>-->

    {{--@include('preQdplay.experiment-qdplay.components.index.what-include')--}}

    {{--@auth
        @if($statusBuy == 0)
            @include('preQdplay.components.checkout')

            @push('scripts')
                <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
            @endpush
        @endif
    @endauth--}}
@endsection

<script type="text/javascript" src="{{asset('index_files/manifest.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/vendor.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/app.js.descarga')}}"></script>
<script type="text/javascript" src="{{asset('index_files/etapa1.js.descarga')}}"></script>
