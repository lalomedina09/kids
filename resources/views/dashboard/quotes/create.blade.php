@extends('layouts.dashboard.blog')

@section('dashboard-content')

    @include('dashboard.quotes.partials._header', ['subtitle' => 'Citas » Nuevo'])

    @include('partials.dashboard.messages')

    <div class="row">
        <div class="col-lg-12">

            @include('dashboard.quotes.partials._form')

        </div>
    </div>

@endsection
