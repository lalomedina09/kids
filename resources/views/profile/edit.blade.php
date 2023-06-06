@extends('layouts.app')

@push('styles')
    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/profile-qd.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <link href="{{ asset('css/alertify/alertify.min.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <link href="{{ asset('css/alertify/default.min.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">

    <style>
        .alertify-notifier .ajs-message.ajs-success{
            font-size: 12px;
            color: #ffffff;
            background-color: #8ad06f;
        }
        .alertify-notifier .ajs-message.ajs-message {
            right: -320px;
            font-size: 12px;
            color: #ffffff;
            background-color: #262525;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/profiles/edit.js') }}"></script>

    <!-- script para las alertas-->
    <script type="text/javascript" src="{{ asset('js-new/plugins/alertify.min.js') }}?v={{ (rand(1,500)) }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/models/branches.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/models/companyroles.js') }}?v={{ (rand(1,500)) }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/tools/budget/functions-modal.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/functions.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/components/numero-decimal.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/month/component-month.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/month/month.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/year/component-year.js') }}?v={{ (rand(1,500)) }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/year/year.js') }}?v={{ (rand(1,500)) }}"></script>
@endpush

@section('content')

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4">

                <!--- Empieza caja gris --->
                <div class="box-gray text-center p-3 mb-3">
                    <div class="mb-3">
                        <img src="{{ $user->present()->profile_photo }}" class="image--profile-change" alt="profile photo">
                        <p class="image--profile-change__alert mt-2 text-danger d-none">
                            <small>@lang('The profile photo will be updated until save the changes')</small>
                        </p>
                    </div>

                    <p class="text-danger text-bold mb-0 small">{{ $user->present()->fullname }}</p>
                    <p class="text-primary m-0" style="font-size:60%">
                        @php
                            $separate = divEmailProfile($user->present()->email)
                        @endphp
                        {{ $separate[0] }} <br> <span>@</span>{{ $separate[1] }}
                    </p><!--text-xsmall -->

					@if (($current_subscription = \QD\QDPlay\Models\Subscription::current($user->id)))
					<div class="mt-4 profile__content-info d-flex align-items-center">
						<p class="text-bold text-large m-0">@lang('Plan')</p>
						<span></span>
						<p class="text-large m-0">{{ $current_subscription->plan }}</p>
					</div>
					@endif

                    @if (false && $user->hasMeta('blog', 'birthdate'))
                        <div class="mt-4 profile__content-info d-flex align-items-center">
                            <p class="text-bold text-large m-0">@lang('Age')</p>
                            <span></span>
                            <p class="text-large m-0">{{ $user->present()->age }} años</p>
                        </div>
                    @endif
                </div>
                <!--- Termina caja gris --->

                <nav class="nav flex-column">
                    <a href="#{{ str_slug(__('General information')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab">@lang('My Profile')</a>

                    <!--<a href="#{{ str_slug(__('Billing Data')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab">@lang('Billing Data')</a>--->

                    <!--<a href="#{{ str_slug(__('Update password')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab">@lang('Update password')</a>-->

                    <a href="#{{ str_slug(__('My interests')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab">@lang('Blog')</a>

                    {{--
                        <a href="#{{ str_slug(__('My bookmarks')) }}"
                            class="nav-item nav-link text-uppercase c-text-size"
                            data-toggle="tab"
                        >@lang('My bookmarks')</a>
                    --}}
                    {{--@if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
                        <a href="#{{ str_slug(__('My personal profile')) }}"
                            class="nav-item nav-link text-uppercase c-text-size"
                            data-toggle="tab"
                        >@lang('My personal profile')</a>
                    @endif--}}
                    {{--
                    @if ($user->hasPaymentRoles() || $user->hasExhibitorRoles())
                        <a href="#{{ str_slug(__('Payment')) }}"
                            class="nav-item nav-link text-uppercase c-text-size"
                            data-toggle="tab"
                        >@lang('Payment')</a>
                    @endif
                    --}}
                    {{--@if (config()->has('money.modules.advice'))
                        <a href="#{{ str_slug(__('Advices')) }}"
                            class="nav-item nav-link text-uppercase c-text-size"
                            data-toggle="tab"
                        >@lang('Advices')</a>
                    @endif--}}

                    @if (config()->has('money.modules.advice'))
                        <a href="#{{ str_slug(__('Advices')) }}"
                            class="nav-item nav-link text-uppercase c-text-size"
                            data-toggle="tab"
                        >@lang('Advices')</a>

                        {{--@if ($user->hasRole('advisor'))
                            <a href="#{{ str_slug(__('Advice prices')) }}"
                                class="nav-item nav-link text-uppercase c-text-size"
                                data-toggle="tab"
                            >@lang('Advice prices')</a>

                            <a href="#{{ str_slug(__('Calendar & Schedule')) }}"
                                class="nav-item nav-link text-uppercase c-text-size"
                                data-toggle="tab"
                            >@lang('Calendar & Schedule')</a>
                        @endif--}}
                    @endif

                    <a href="#{{ str_slug(__('My Company')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('My Company')
                    </a>
                    <!-- Btn oculto herramientas mientras hago correcciones y actualizacion de imagenes-->
                    <a href="#{{ str_slug(__('Tools')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('Tools')
                        <img src="{{ asset('etapa1/GIF-NEW-Querido-dinero.gif') }}" alt="new" width="35" />
                    </a>

                    <a href="#{{ str_slug(__('QD Play')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('QD Play')
                        <img src="{{ asset('etapa1/GIF-NEW-Querido-dinero.gif') }}" alt="new" width="35" />
                    </a>

                    <a href="/queridodinero/app_close.html"
                    class="nav-item nav-link text-uppercase c-text-size"
                    >@lang('Salir')</a>

                </nav>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                <div class="tab-content mb-5">
                    <!-- Archivos para seccion del usuario -->
                    @include('partials.profiles.general')
                    @include('partials.profiles.photo')

                    <!-- Archivos para seccion de compañia-->
                    @include('partials.profiles.company')
                    @include('partials.profiles.branches')
                    @include('partials.profiles.roles')

                    <!-- Archivos para seccion de Herramientas -->
                    @include('partials.profiles.tools')
                    {{--@include('partials.profiles.components.tools.budget')--}}

                    <!-- Incluir vista para admin de QD Play-->
					@include('qd:qdplay::home.partials.billingData')
                    @include('partials.profiles.company')

                    @include('partials.profiles.password')
                    @include('partials.profiles.delete')
                    @include('partials.profiles.interests')
                    @include('partials.profiles.bookmarks')

                    @if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
                        @include('partials.profiles.personal')
                    @endif

                    @if ($user->hasPaymentRoles() || $user->hasExhibitorRoles())
                        @include('partials.profiles.payment')
                    @endif

                    @if (config()->has('money.modules.advice'))
                        @include('qd:advice::partials.profiles.advice')

                        @if ($user->hasRole('advisor'))
                            @include('qd:advice::partials.advisors.prices')
                            @include('qd:advice::partials.advisors.calendar')
                        @endif
                    @endif

					@include('qd:qdplay::home.partials.profile')
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals.branchAndRole')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{--
    <script type="text/javascript">
    $(function () {
        //Levamos la primer grafica para los ingresos
        var ctx = document.getElementById("myChartIngresos").getContext('2d');
        var arrayMeses =  {!! json_encode($labels) !!};
        var arrayIngresosReales =  {!! json_encode($data) !!};
        var arrayingresosEstimados =  {!! json_encode($data2) !!};
            var data = {
                datasets: [
                        {
                            label: 'Ingresos Reales',
                            backgroundColor: 'rgb(3, 218, 202)',
                            borderColor: 'rgb(3, 218, 202)',
                            data: arrayIngresosReales,
                        },
                        {
                            label: 'Ingresos Estimados',
                            backgroundColor: 'rgb(0, 0, 0)',
                            borderColor: 'rgb(0, 0, 0)',
                            data: arrayingresosEstimados,
                        }
                    ],
                labels: arrayMeses
            };
            var myDoughnutChart = new Chart(ctx, {
                //type: 'doughnut',
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    },
                    title: {
                        display: true,
                        text: 'Grafica de tus ingresos estimados vs reales'
                    }
                }
            });


        //Iniciamos la segunda grafica para los gastos
        var ctx_2 = document.getElementById("myChartGastos").getContext('2d');
        var data_2 = {
            datasets: [
                {
                    label: 'Gastos Reales',
                    backgroundColor: 'rgb(3, 218, 202)',
                    borderColor: 'rgb(3, 218, 202)',
                    data: arrayIngresosReales,
                },
                {
                    label: 'Gastos Estimados',
                    backgroundColor: 'rgb(0, 0, 0)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: arrayingresosEstimados,
                }
            ],
                labels: arrayMeses
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
                type: 'line',
                data: data_2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    },
                    title: {
                        display: true,
                        text: 'Grafica de tus gastos estimados vs reales'
                    }
                }
            });

        //empieza la graficas de pie por categorias
    });
    </script>
    --}}
@endsection
