@extends('layouts.qdplay-page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/dashboard/users/edit.js') }}"></script>
@endpush

@section('page')

<div class="row">
    <div class="col-sm-12 col-12">
        <div class="p-3" style="background-color: #262525;">
            @include('auth.qdplay.components.register.form-exhbitor')
        </div>
    </div>
</div>

@endsection
