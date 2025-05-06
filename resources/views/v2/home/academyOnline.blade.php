@extends('layouts.app-v2-redesign')

<title>Academia Online | Querido Dinero</title>

@section('content')

{{--@include('v2.home.services.banner')--}}

{{--@include('v2.home.services.section-info-1')--}}

<div>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-center order-1 order-md-2">
            <div class="stackview">
                <div class="view bg-light"></div>
                <img src="{{ asset('version-2/images/services/color-academia.png') }}" id="img-service-qdplay-desktop" alt="Imagefortyeight" class="img-fluid imagefortyeight" />
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('version-2/images/services/color-academia.png') }}">
                    <source media="(min-width: 768px)" srcset="{{ asset('version-2/images/services/color-academia.png') }}">
                </picture>
            </div>

        </div>
    </div>
</div>



@endsection
