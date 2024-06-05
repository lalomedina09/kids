@extends('layouts.landing-v2-white')
{{--@extends('layouts.landing')--}}

@if (app()->environment() === 'production')
@push('scripts-inline')
    @include('preQdplay.components.fb-convercion')
@endpush
@endif

{{-- Estilos css3- --}}
@push('styles')
{{--@include('landings.components.retiro.style')--}}


@endpush

@push('styles-inline')

@endpush

@section('content')

<div class="container pt-0 pt-lg-4">
    <div class="row">
        <div class="col-md-12">
            <div data-tf-live="01HZMQ8WRQ96SATTPANJTXBCT8"></div>
            <script src="//embed.typeform.com/next/embed.js"></script>
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
