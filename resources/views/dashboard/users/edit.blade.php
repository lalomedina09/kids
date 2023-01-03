@extends('layouts.dashboard.admin')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/dashboard/users/edit.js') }}"></script>
@endpush

@section('dashboard-content')

    @include('dashboard.users.partials._header', ['subtitle' => "Usuarios » {$user->present()->full_name}"])

    @include('partials.dashboard.messages')

    <ul class="nav nav-tabs mb-4">
        <a href="#general"
            class="nav-item nav-link active"
            data-toggle="tab">@lang('General information')</a>

        @if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
            <a href="#profile"
                class="nav-item nav-link"
                data-toggle="tab">@lang('Personal profile')</a>
        @endif

        @if ($user->hasPaymentRoles() || $user->hasExhibitorRoles())
            <a href="#banking"
                class="nav-item nav-link"
                data-toggle="tab">@lang('Banking information')</a>
        @endif
    </ul>

    <div class="tab-content">
        <div id="general" class="tab-pane active">
            @include('dashboard.users.partials._form', ['update' => true])
        </div>

        @if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
            <div id="profile" class="tab-pane">
                @include('dashboard.users.partials._profile', ['update' => true])
            </div>
        @endif

        @if ($user->hasPaymentRoles() || $user->hasExhibitorRoles())
            <div id="banking" class="tab-pane">
                @include('dashboard.users.partials._banking', ['update' => true])
            </div>
        @endif
    </div>

@endsection
