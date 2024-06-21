@extends('layouts.index-happy')
{{--@extends('layouts.landing')--}}

@push('scripts-inline')
    @if (app()->environment() === 'production')
        @include('preQdplay.components.fb-convercion')
    @endif
    <script type="text/javascript" src="https://s.pointerpro.com/js/embed.js" defer async></script>
@endpush

{{-- Estilos css3- --}}
@push('styles')
{{--@include('landings.components.retiro.style')--}}
<style>
    #app{
        background-color: #292729 !important;
    }

</style>

@endpush

@push('styles-inline')

@endpush

@section('content')

<div class="container-fluid pt-0 pt-lg-0 pb-4 pt-lg-0">
    <div class="row">
        <div class="col-md-12">
            <div class="embed-survey" data-url="qd-indice-felicidad"></div>
            {{--
            <div data-tf-live="01HZMQ8WRQ96SATTPANJTXBCT8"></div>
            <script src="//embed.typeform.com/next/embed.js"></script>
            --}}
        </div>
    </div>
</div>

@endsection

{{-- Scrips --}}
@push('scripts')
<!-- JavaScript de Slick Carousel -->

@endpush

@push('scripts-inline')

@endpush
