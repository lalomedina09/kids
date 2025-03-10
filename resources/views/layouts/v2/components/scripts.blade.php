<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Mostrar la resolución al cargar la página
    window.addEventListener('DOMContentLoaded', function() {
      const width = window.innerWidth;
      const height = window.innerHeight;
      console.log(`Initial Resolution: ${width}x${height}`);
    });

    // Mostrar la resolución cada vez que se redimensiona la ventana
    window.addEventListener('resize', function() {
      const width = window.innerWidth;
      const height = window.innerHeight;
      console.log(`Resolution: ${width}x${height}`);
    });

    //Actualizar el año del footer de forma automatica
    document.getElementById("current-year").textContent = new Date().getFullYear();
</script>

@php $urlQdplayCompany = Route::currentRouteName();@endphp
@if (app()->environment() === 'production')

@if(false)<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4887802.js">
</script>@endif

@include('partials.main.scripts.facebook')

@else

@endif

@include('partials.main.scripts.google')


<input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
<script type="text/javascript" src="{{ asset('i18n?v='.config('money.app.subversion')) }}"></script>
{{--
<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
--}}
{{--
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
--}}
{{--
<script type="text/javascript" src="{{ mix('js/interactables/interactables.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor/validator.js') }}"></script>
--}}
@auth
<script type="text/javascript" src="{{ asset('js/notifications/get_advices.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/reschedules/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/advices/userConnected.js') }}"></script>
@endauth

<script type="text/javascript" src="{{ asset('js/advices/advisorPricexTime.js') }}"></script>

<!-- script para zoho -->
<script>
    window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}
</script>
<script id="zsiqscript"
    src="https://salesiq.zohopublic.com/widget?wc=siq6b3fee2ee017eee9ec27d03434ab542ecf8f2baadacdf37e233b95c3ae9b0dc3"
    defer></script>
<!--------------------->
@stack('scripts')
@stack('scripts-inline')
