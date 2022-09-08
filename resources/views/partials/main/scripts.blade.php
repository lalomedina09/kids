@if (app()->environment() === 'production')
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

    @if(false)<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4887802.js"></script>@endif

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', "{{ config('services.facebook.pixelId') ?: '' }}");
        fbq('track', 'PageView', 'Purchase');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={your-pixel-id-goes-here}&ev=PageView&noscript=1"/>
    </noscript>

    <div id="fb-root"></div>
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1494181534177770"
        theme_color="#FF6161"
        logged_in_greeting="Hola, ¿cómo podemos ayudarte?"
        logged_out_greeting="Hola, ¿cómo podemos ayudarte?">
    </div>

    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v5.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script type="text/javascript">
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:{{ config('services.hotjar.hjid') }},hjsv:{{ config('services.hotjar.hjsv') }}};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
@else
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
@endif
<input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
<script type="text/javascript" src="{{ asset('i18n?v='.config('money.app.subversion')) }}"></script>
<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

<script type="text/javascript" src="{{ mix('js/interactables/interactables.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor/validator.js') }}"></script>

@auth
    <script type="text/javascript" src="{{ asset('js/notifications/get_advices.js') }}"></script>
    <script>
        /*
        $(document).ready(function () {

            let url = '/notifications/advices';
            let token = $('#token').val();
            //console.log('empieza a buscar asesorias');
            $.post(url, {
                    _token: token
                    //id: id,
                    //status: status,
                },
                function(data) {
                    console.log(data);
                    //$("#not_item_" + id).empty();
                    //$("#not_item_" + id).html(data.view);
                    //console.log('debio agregar la info al interior deldiv');
                    console.log('cacacacasadododod');
                    //$('#getAdvicesPending').modal('toggle')
                });
        });*/
    </script>
@endauth

@stack('scripts')
@stack('scripts-inline')
