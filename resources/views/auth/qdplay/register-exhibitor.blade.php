@extends('layouts.qdplay-page')

@section('page')

<div class="row">
    <div class="col-xl-8 offset-md-2 col-lg-8 offset-md-2 col-md-8 offset-md-2 col-sm-12 col-12">
        <div class="p-3" style="background-color: #262525;">
            @include('auth.qdplay.components.register.form-exhbitor')
        </div>
    </div>
</div>

@endsection
