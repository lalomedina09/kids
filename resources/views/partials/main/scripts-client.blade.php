@php $urlQdplayCompany = Route::currentRouteName();@endphp
@if (app()->environment() === 'production')

@if(false)
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4887802.js">
    </script>
@endif



@else

@endif

@include('partials.main.scripts.google')

<input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
<script type="text/javascript" src="{{ asset('i18n?v='.config('money.app.subversion')) }}"></script>
<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

<script type="text/javascript" src="{{ mix('js/interactables/interactables.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor/validator.js') }}"></script>

@auth
    <script type="text/javascript" src="{{ asset('js/notifications/get_advices.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/reschedules/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/advices/userConnected.js') }}"></script>
@endauth
<script type="text/javascript" src="{{ asset('js/advices/advisorPricexTime.js') }}"></script>

@stack('scripts')
@stack('scripts-inline')
