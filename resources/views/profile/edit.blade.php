@extends('layouts.app')

@push('styles')
    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/profile-qd.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <style>

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/profiles/edit.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/models/branches.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/models/companyroles.js') }}"></script>
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
                    <p class="text-primary m-0 small">{{ $user->present()->email }}</p><!--text-xsmall -->

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
                    <!--<a href="#{{ str_slug(__('Tools')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('Tools')
                    </a>-->

                    <a href="#{{ str_slug(__('QD Play')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('QD Play')
                        <img src="{{ asset('etapa1/GIF-NEW-Querido-dinero.gif') }}" alt="new" width="50" />
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
@endsection
