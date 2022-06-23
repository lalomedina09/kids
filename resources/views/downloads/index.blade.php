@extends('layouts.page')

@section('page')

<h3 class="home__title home__title--secondary">
    Sección de descargas
</h3>

<div class="row flex-row">
    @foreach($downloads as $download)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-12 mb-2 align-self-start">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-2">
                        <span class="fa fa-5x {{ $download->icon }}"></span>
                    </div>
                    <p class="card-title"><b>{{ $download->name }}</b></p>
                    <p class="card-subtitle mb-2 text-muted text-xsmall">{{ $download->payload->file_name }}</p>
                    <p class="card-text text-small">{{ $download->description }}</p>
                    <a href="{{ $download->link }}" class="btn btn-pill btn-block btn-danger" target="_blank">
                        <span class="fa fa-download"></span>
                        Descargar
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
