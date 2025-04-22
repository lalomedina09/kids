@php $urlQdplayCompany = Route::currentRouteName();@endphp
@if (app()->environment() === 'production')
    {{-- @if ($urlQdplayCompany != "register.qdplay.show")
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analyticsKey') ?: 'UA-XXXXX-Y' }}"></script>
        <script type="text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', "{{ config('services.google.analyticsKey') ?: 'UA-XXXXX-Y' }}");
            gtag('config', "{{ config('services.google.adsKey') ?: 'AW-NNNNNNNNN' }}");
        </script>
    @endif --}}
    <!-- Google tag (gtag.js) -->
{{--
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S7ZQGNNHEF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S7ZQGNNHEF');
</script>
--}}
@if(false)<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4887802.js"></script>@endif

    @include('partials.main.scripts.facebook')

@else
    {{--
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics_debug.js','ga');

        window.ga_debug = {trace: true};
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'sendHitTask', null);
        ga('send', 'pageview');
    </script>
    --}}
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

@if (app()->environment() === 'production')
    <!-- script para zoho -->
    <script>
        window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}
    </script>
    <script id="zsiqscript"
        src="https://salesiq.zohopublic.com/widget?wc=siq6b3fee2ee017eee9ec27d03434ab542ecf8f2baadacdf37e233b95c3ae9b0dc3"
        defer>
            
    </script>
@endif

<!--------------------->
@stack('scripts')
@stack('scripts-inline')
