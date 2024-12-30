@extends('layouts.app-v1')

@push('styles')
    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
    <style>
        .c-text-size{
            font-size: 100%
        }

.pencil {
	display: inline-block;
	position: relative;
}

.pencil::after {
	position: absolute;
	top: 0;
	right: 0;
	display: block;
	content: "";
	height: 32px;
	width: 32px;
	background-image: url("{{ asset('etapa1/pencil-60-32.png') }}");
	background-size: cover;
}
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/profiles/edit.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/models/branches.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/models/companyroles.js') }}"></script>

    <!-- scripts para presupuesto--->
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/functions-modal.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/tools/budget/month/month.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/month/component-month.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js-new/tools/budget/year/year.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js-new/tools/budget/year/component-year.js') }}"></script>
@endpush


@section('content')

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4">

                <!--- Empieza caja gris --->
                <div class="box-gray text-center p-3 mb-3">
                    <div class="mb-3">
						<a href="#cambiar-foto-de-perfil" class="pencil" data-toggle="tab">
							<img src="{{ $user->present()->profile_photo }}" class="image--profile-change" alt="profile photo">
						</a>
                        <p class="image--profile-change__alert mt-2 text-danger d-none">
                            <small>@lang('The profile photo will be updated until save the changes')</small>
                        </p>
                    </div>

                    <p class="text-danger text-bold mb-0 small">{{ $user->present()->fullname }}</p>
                    <p class="text-primary m-0 small">{!! substr_replace($user->present()->email, '<wbr />', strpos($user->present()->email, '@'), 0) !!}</p><!--text-xsmall -->

					@if (($current_subscription = \QD\QDPlay\Models\Subscription::current($user)) instanceof \QD\QDPlay\Models\Subscription)
					<div class="mt-4 profile__content-info d-flex align-items-center">
						<p class="text-bold text-large m-0">@lang('Plan')</p>
						<span></span>
						<p class="text-large m-0">{{ $current_subscription->plan_type_name }}</p>
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
                    @endif --}}
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
                    @endif --}}

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
                        @endif --}}
                    @endif

                    <a href="#{{ str_slug(__('Tools')) }}" class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab">@lang('Tools')
                    </a>

                    <a href="#{{ str_slug(__('My Company')) }}"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('My Company')
                    </a>

                    <a href="#qdplay-subscription"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('QD Play')
                        <img src="{{ asset('etapa1/GIF-NEW-Querido-dinero.gif') }}" alt="new" width="50" />
                    </a>

                    <a href="#qdplay-learning-paths"
                        class="nav-item nav-link text-uppercase c-text-size"
                        data-toggle="tab"
                        >@lang('Learning Paths')
                    </a>

                    <a href="{{ route('logout') }}"
                    class="nav-item nav-link text-uppercase c-text-size"
                    >@lang('Cerrar sesión')</a>

                </nav>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                <div class="tab-content mb-5">
                    @include('partials.profiles.general')
                    @include('partials.profiles.photo')

                    @include('partials.profiles.company')
                    @include('partials.profiles.branches')
                    @include('partials.profiles.roles')

                    @include('partials.profiles.tools')
                    <!-- Incluir vista para admin de QD Play-->
					@include('qd:qdplay::home.partials.billingData')

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

                    @include('qd:qdplay::home.partials.profiles.learning-paths')
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals.branchAndRole')
@endsection
