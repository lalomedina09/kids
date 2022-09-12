@if ($advice)
    @if($reschedule)
        @if($reschedule->status == 1)
            @include('partials.modals.advice.content.advised')
        @else
            @include('partials.modals.advice.reschedule.actions-for-advised')
        @endif
    @else
        @include('partials.modals.advice.content.advised')
    @endif
@endif
