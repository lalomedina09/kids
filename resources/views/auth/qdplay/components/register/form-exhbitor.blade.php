@push('styles')

    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">

    @endpush

@push('scripts')

    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/auth/register.js') }}"></script>

@endpush

@include('auth.qdplay.components.register.exhibitor.data-general')

