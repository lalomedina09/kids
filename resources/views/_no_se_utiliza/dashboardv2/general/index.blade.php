@extends('layouts.dashboard-v2.base')

@section('dashboard-content')

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

        <div class="row">
            @include('dashboardv2.general.components.cards-numbers')
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                @include('dashboardv2.general.components.occasion-ads')
            </div>
            <div class="col-xl-3 col-md-6">
                @include('dashboardv2.general.components.post-top')
            </div>
            <div class="col-xl-3 col-md-6">
                @include('dashboardv2.general.components.collabs-facebook')
            </div>
        </div>
    </div>

@endsection
