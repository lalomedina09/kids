@extends('layouts.app')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/notifications/status.js') }}"></script>
@endpush

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                @lang('List Notifications'):
            </h3>

            <div class="col-md-12">
                @if ($notifications)
                        <hr>
                    @foreach($notifications as $item)
                        <div class="row" id="not_item_{{ $item->id }}">
                            @include('notifications.components.item', ['item' => $item])
                        </div>
                        <hr>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p class="text-center">Aun no hay notificaciones disponibles</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
