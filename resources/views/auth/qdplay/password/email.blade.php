@extends('layouts.qdplay-page')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/auth/email.js') }}"></script>
@endpush

@section('page')

<div class="row">
    <div class="col-xl-6 offset-md-3 col-lg-6 offset-md-3 col-md-6 offset-md-3 col-sm-8 offset-md-2 col-12">
        <div class="p-3" style="background-color: #262525;">
            <p class="text-danger text-uppercase text-center mb-1">Parece que olvidaste algo</p>
            <h4 class="modal__title text-uppercase text-center mb-5">Restablecer contraseña</h4>

            <form action="{{ route('password.qdplay.email') }}" method="POST"
                id="form-email" class="form-custom form-modal">
                @csrf

                <div class="form-group">
                    <label class="text-uppercase">* @lang('E-Mail')</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="small text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group mx-auto">
                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                    @if ($errors->has('g-recaptcha-response'))
                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>

                <p class="small font-italic">
                    (*) @lang('The field is required')
                </p>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-danger btn-pill">
                        Restablecer contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
