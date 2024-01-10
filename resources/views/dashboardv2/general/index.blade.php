@extends('layouts.dashboard-v2.base')

@section('dashboard-content')

    {{--@include('dashboardv2.general.cards')--}}
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                            <!--
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                            <li class="breadcrumb-item active">Horizontal Layout</li>
                            -->
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard Panoramico</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @include('dashboardv2.general.components.cards-numbers')
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6 col-md-6">
                @include('dashboardv2.general.components.occasion-ads')
            </div>

            <div class="col-xl-3 col-md-6">
                @include('dashboardv2.general.components.post-top')
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center mt-4 mb-3">
                            <h2 class="fw-normal text-primary display-4" data-plugin="counterup">
                                10
                            </h2>
                            <h5>Promedio de respuesta de facebook</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center mt-4 mb-3">
                            <h2 class="fw-normal text-primary display-4" data-plugin="counterup">
                                5
                            </h2>
                            <h5>Colaboraciones</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{--@include('dashboardv2.general.cards-1')--}}

    </div>

@endsection
