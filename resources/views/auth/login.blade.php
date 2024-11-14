@extends('layouts.v2.page')
@section('page')

<div class="row">
    <div class="col-xl-6 offset-md-3 col-lg-6 offset-md-3 col-md-6 offset-md-3 col-sm-8 offset-md-2 col-12">
        <div class="p-3" style="background-color: #262525; margin-top:50px;">
            @include('partials.auth.login_form')
        </div>
    </div>
</div>

@endsection
