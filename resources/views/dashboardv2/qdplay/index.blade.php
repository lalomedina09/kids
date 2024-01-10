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
                    <h4 class="page-title">Dashboard QD Play</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('dashboardv2.general.cards-1')

        @include('dashboardv2.general.cards-2')

        @include('dashboardv2.general.cards-3')

        @include('dashboardv2.general.cards-4')

    </div>

@endsection
