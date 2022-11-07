@extends('layouts.qdplay-page')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/auth/email.js') }}"></script>
@endpush

@section('page')

<div class="row">
    <div class="col-xl-6 offset-md-3 col-lg-6 offset-md-3 col-md-6 offset-md-3 col-sm-8 offset-md-2 offset-sm-2 col-12">
        <div class="p-3" style="background-color: #262525;">
            <h4 class="modal__title text-uppercase text-center mb-5 text-green">
                Correo de recuperación <br> enviado correctamente
            </h4>

            <p class="text-danger text-uppercase text-center mb-1 text-white">
                Reviza tu bandeja de entrada
            </p>
        </div>
    </div>
</div>

@endsection
