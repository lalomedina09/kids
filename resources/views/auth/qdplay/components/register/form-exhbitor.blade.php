@push('styles')

    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">

@endpush

@push('scripts')

    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/auth/register.js') }}"></script>

@endpush

@if($step_exhibitor == null | $step_exhibitor == 1)
    @include('auth.qdplay.components.register.exhibitor.data-general')
@elseif($step_exhibitor == 2)
    @include('auth.qdplay.components.register.exhibitor.data-profile')
@elseif($step_exhibitor == 3)
    @include('auth.qdplay.components.register.exhibitor.data-bank')
@endif

