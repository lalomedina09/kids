@extends('layouts.app')

@section('content')
<style>
    .bg-green-blue {
        bagkground-color: #90d06b;
        background-image: linear-gradient(to right, #90d06b, #01dacb);
    }
    .text-green {
        color: #81cc56;
    }

    .form-custom input:not(.btn):hover, .form-custom input:not(.btn):focus, .form-custom input:not(.btn):active, .form-custom input:not(.btn):visited {
        border-bottom: 1px solid #ffffff;
        box-shadow: none;
        outline: none;
    }

    .text-danger, .legals-content h1, .legals-content h2, .legals-content h3, .legals-content h4, .legals-content h5, .legals-content h6 {
        color: #ffffff !important;
    }

    .line-curve-top{
        background-image: url(/images/qdplay/auth/line-curve-top.png);
        background-size: 200px;
        background-repeat: no-repeat;
        padding-top: 15px;
        background-position: 100% 0%;
    }
    .line-curve-bottom{
        background-image: url(/images/qdplay/auth/line-curve-bottom.png);
        background-size: 200px;
        background-repeat: no-repeat;
        padding-top: 15px;
        background-position: 0% 100%;
    }
    .form-custom input:-webkit-autofill {
        -webkit-text-fill-color: #ffffff !important;
    }

    .form-custom input:not(.btn) {
        background-color: transparent;
        border-bottom: 1px solid #9B9B9B;
        border-left: none;
        border-radius: 0;
        border-right: none;
        border-top: none;
        color: #ffffff;
        outline: none;
        padding: 5px 0;
        width: 100%;
    }
    .form-custom input:-webkit-autofill {
        -webkit-text-fill-color: #ffffff !important;
    }

    .form-custom input:not(.btn) {
        background-color: transparent;
        border-bottom: 1px solid #9B9B9B;
        border-left: none;
        border-radius: 0;
        border-right: none;
        border-top: none;
        color: #ffffff;
        outline: none;
        padding: 5px 0;
        width: 100%;
    }
    .custom-control-indicator {
        background-clip: padding-box;
        background-color: transparent;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 75% 75%;
        border: 1px solid #ffffff;
        box-shadow: inset 0 1px 2px rgb(0 0 0 / 8%);
        cursor: pointer;
        display: block;
        height: 18px;
        width: 18px;
        left: 0;
        top: 2px;
        position: absolute !important;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /********************************************************/
    @media (min-width: 320px){
        .line-curve-top{
            background-size: 200px;
            padding-top: 15px;
            background-position: 100% 0%;
        }
        .line-curve-bottom{
            background-size: 200px;
            padding-top: 15px;
            background-position: 0% 100%;
        }
    }
    /********************************************************/
    @media (min-width: 360px){
        .line-curve-top{
            background-size: 130px;
            padding-top: 10px;
            background-position: 100% 0%;
        }
        .line-curve-bottom{
            background-size: 162px;
            padding-top: 70px;
            background-position: -29% 97%;
            z-index: 1;
        }
        .logo-qdplay{
            width: 90px;
            margin-bottom: -40px;
        }
    }
    /********************************************************/
    @media (min-width: 410px){
        .line-curve-bottom{
            background-size: 162px;
            padding-top: 70px;
            background-position: -5% 100%;
            z-index: 1;
            padding-bottom: 50px;
        }
        .logo-qdplay{
            width: 95px;
            margin-bottom: -40px;
        }
    }
    /********************************************************/
    @media (min-width: 600px){
        .line-curve-top{
            background-size: 200px;
            padding-top: 10px;
            background-position: 100% 0%;
        }
        .line-curve-bottom{
            background-size: 200px;
            background-position: 0% 100%;
            z-index: 1;
            padding-bottom: 143px;
        }
    }
    /********************************************************/
    @media (min-width: 800px){

    }
    /********************************************************/
    @media (min-width: 1000px){

    }
    /********************************************************/
    @media (min-width: 1300px){

    }
    /********************************************************/
</style>

<div class="line-curve-top">
    <div class="container">
        <div class="text-center my-4">
            <img src="{{ asset('images/qdplay/logo/logo.png') }}" class="animated fadeInDown logo-qdplay" width="12%">
        </div>
        <div class="mt-5">
            @yield('page')
        </div>
    </div>
</div>
<div class="line-curve-bottom">

</div>
@endsection
