<!-- agregue version rand para actualizar la cache de los navegadores -->
{{--<link href="{{ mix('css/app.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">--}}

{{--
<link href="{{ asset('css/custom.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
--}}

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('version-2/css/globals.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/style.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/services/styles.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/animations.css') }}?v={{ (rand(1,500)) }}" />
<link rel="stylesheet" href="{{ asset('version-2/css/mediaqueries.css') }}?v={{ (rand(1,500)) }}" />


<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


@stack('styles')
@stack('styles-inline')
