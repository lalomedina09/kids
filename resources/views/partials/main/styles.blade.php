<!-- agregue version rand para actualizar la cache de los navegadores -->
<link href="{{ mix('css/app.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

@stack('styles')
@stack('styles-inline')
