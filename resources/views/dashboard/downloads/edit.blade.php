@extends('layouts.dashboard.admin')

@section('dashboard-content')

    @include('dashboard.downloads.partials._header', ['subtitle' => 'Descargas » Editar', 'link' => true])

    @include('partials.dashboard.messages')

    @include('dashboard.downloads.partials._form', ['route' => route('dashboard.downloads.update', [$download->id])])

@endsection
