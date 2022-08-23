@extends('layouts.app')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/notifications/status.js') }}"></script>
@endpush

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">
                @lang('List Notifications'):
            </p>

            <div class="col-md-12">
                @if (count($notifications)>0)
                    @foreach($notifications as $item)
                        <div class="row">
                            <div class="col-md-1 text-center">
                                @if ($item->status == 1)
                                <!-- Leido -->
                                    <a href="#" onclick="updateStatusNotification({{ $item->status }})">
                                        <i class="lni lni-smile"></i>
                                    </a>
                                @else
                                <!-- No Leido -->
                                    <a href="#" onclick="updateStatusNotification({{ $item->status }})">
                                        <i class="lni lni-checkmark"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-11">
                                {{ $item->getDateHuman($item->created_at) }} <br>
                                <b>{{ $item->subject }}</b>
                                <br>
                                {{ $item->description }} <br>
                                @if($item->url) <a href="{{ url($item->url) }}">Ver más</a> @endif
                            </div>
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
