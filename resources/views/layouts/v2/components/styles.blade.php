<!-- agregue version rand para actualizar la cache de los navegadores -->
{{--
<link href="{{ mix('css/app.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
--}}
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />


 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />


<link rel="stylesheet" href="{{ asset('version-2/css/globals.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/style.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/services/styles.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/animations.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/mediaqueries.css') }}?v={{ (rand(1,500)) }}" />

<!---------------->

@if (!in_array(Route::currentRouteName(), [
    'home', 'services', 'consulting', 'contact',
    'agency', 'blog', 'articles.search.full', 'articles.by.tag',
    'articles.by.word','articles.show','articles.by.word','payments.v2'
    ]))
    <link href="{{ asset('css/custom.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
@endif

@if (in_array(Route::currentRouteName(), ['articles.show']))
@endif
<link href="{{ asset('css/app-backup.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<!---------------->

<link rel="stylesheet" href="{{ asset('version-2/css/iziToast.min.css') }}">
<script src="{{ asset('version-2/js/iziToast.min.js') }}" type="text/javascript"></script>

<!---------------->
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

<!--
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.rtl.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.rtl.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.rtl.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.rtl.min.css" />
<!---------------->
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


@stack('styles')
@stack('styles-inline')
