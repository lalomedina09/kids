@if ($advice)
    @if($reschedule)
        @if($reschedule->status == 1)
            @include('partials.modals.advice.content.advisor')
        @else
            @include('partials.modals.advice.reschedule.actions-for-advisor')
        @endif
    @else
        @include('partials.modals.advice.content.advisor')
    @endif
@endif
