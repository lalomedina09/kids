@extends('layouts.app')

@push('styles')
    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/profiles/edit.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4">
                <div class="box-gray text-center p-3 mb-3">
                    <div class="mb-3">
                        <img src="{{ $user->present()->profile_photo }}" class="image--profile-change" alt="profile photo">
                        <p class="image--profile-change__alert mt-2 text-danger d-none">
                            <small>@lang('The profile photo will be updated until save the changes')</small>
                        </p>
                    </div>

                    <p class="text-danger text-bold mb-0">{{ $user->present()->fullname }}</p>
                    <p class="text-xsmall text-primary m-0">{{ $user->present()->email }}</p>

                    @if ($user->hasMeta('blog', 'birthdate'))
                        <div class="mt-4 profile__content-info d-flex align-items-center">
                            <p class="text-bold text-large m-0">@lang('Age')</p>
                            <span></span>
                            <p class="text-large m-0">{{ $user->present()->age }} años</p>
                        </div>
                    @endif
                </div>

                <nav class="nav flex-column">
                    <a href="#{{ str_slug(__('General information')) }}"
                        class="nav-item nav-link text-uppercase"
                        data-toggle="tab"
                    >@lang('General information')</a>

                    <a href="#{{ str_slug(__('Update password')) }}"
                        class="nav-item nav-link text-uppercase"
                        data-toggle="tab"
                    >@lang('Update password')</a>

                    <a href="#{{ str_slug(__('My interests')) }}"
                        class="nav-item nav-link text-uppercase"
                        data-toggle="tab"
                    >@lang('My interests')</a>

                    <a href="#{{ str_slug(__('My bookmarks')) }}"
                        class="nav-item nav-link text-uppercase"
                        data-toggle="tab"
                    >@lang('My bookmarks')</a>

                    @if ($user->hasProfileRoles())
                        <a href="#{{ str_slug(__('My personal profile')) }}"
                            class="nav-item nav-link text-uppercase"
                            data-toggle="tab"
                        >@lang('My personal profile')</a>
                    @endif

                    @if ($user->hasPaymentRoles())
                        <a href="#{{ str_slug(__('Payment')) }}"
                            class="nav-item nav-link text-uppercase"
                            data-toggle="tab"
                        >@lang('Payment')</a>
                    @endif

                    @if (config()->has('money.modules.advice'))
                        <a href="#{{ str_slug(__('Advices')) }}"
                            class="nav-item nav-link text-uppercase"
                            data-toggle="tab"
                        >@lang('Advices')</a>

                        @if ($user->hasRole('advisor'))
                            <a href="#{{ str_slug(__('Advice prices')) }}"
                                class="nav-item nav-link text-uppercase"
                                data-toggle="tab"
                            >@lang('Advice prices')</a>

                            <a href="#{{ str_slug(__('Calendar & Schedule')) }}"
                                class="nav-item nav-link text-uppercase"
                                data-toggle="tab"
                            >@lang('Calendar & Schedule')</a>
                        @endif
                    @endif
                </nav>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                <div class="tab-content mb-5">
                    @include('partials.profiles.general')
                    @include('partials.profiles.password')
                    @include('partials.profiles.interests')
                    @include('partials.profiles.bookmarks')

                    @if ($user->hasProfileRoles())
                        @include('partials.profiles.personal')
                    @endif

                    @if ($user->hasPaymentRoles())
                        @include('partials.profiles.payment')
                    @endif

                    @if (config()->has('money.modules.advice'))
                        @include('qd:advice::partials.profiles.advice')

                        @if ($user->hasRole('advisor'))
                            @include('qd:advice::partials.advisors.prices')
                            @include('qd:advice::partials.advisors.calendar')
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--@include('qd:advice::advice.modals.refund')--}}
@endsection
