@extends(($landing) ? 'layouts.landing' : 'layouts.app')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        <script id="fbq-track-ViewContent">
            fbq('track', 'ViewContent', {
                content_ids: ['{{ $course->id }}'],
                content_category: '{{ $course->category->present()->name }}',
                content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                content_type: 'course'
            });
            document.getElementById('fbq-track-ViewContent').remove();
        </script>

        <script id="fbq-track-InitiateCheckout">
            (function () {
                if (!window.fbq) return;
                var btns = document.getElementsByClassName('btn-checkout');
                if (btns.length <= 0) return;
                for (var b = 0; b < btns.length; b++) {
                    var $btn = btns[b];
                    $btn.addEventListener('click', function (e) {
                        fbq('track', 'InitiateCheckout', {
                            content_ids: ['{{ $course->id }}'],
                            content_category: '{{ $course->category->present()->name }}',
                            content_name: '{{ $course->present()->title }} {{ $course->present()->readable_event_date }}',
                            content_type: 'course',
                            currency: 'MXN',
                            num_items: 1
                        });
                    });
                }
            }());
            document.getElementById('fbq-track-InitiateCheckout').remove();
        </script>
    @endpush
@endif

@section('content')
    @if ($course->slug == 'finanzas-personales-para-empleados')
        @include('courses.components.custom.finanzas-personales.index')
    @else
        @include('courses.components.show.carousel')
        
        @include('courses.components.show.address')

        @include('courses.components.show.content')
        
        @include('courses.components.show.speakers')

        @include('courses.components.show.itineraries')

        @include('courses.components.show.price&contact')

        @auth
            @if ($course->onlineSellEnabled())
                @include('partials.courses.checkout')

                @push('scripts')
                    <script type="text/javascript" src="{{ mix('js/courses/checkout.js') }}"></script>
                @endpush
            @endif
        @endauth
    @endif
    
@endsection
