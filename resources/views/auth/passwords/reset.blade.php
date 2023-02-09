@extends('layouts.page')

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/auth/reset.js') }}"></script>
@endpush

@section('page')

<div class="row">
    <div class="col-xl-6 offset-md-3 col-lg-6 offset-md-3 col-md-6 offset-md-3 col-sm-8 offset-md-2 col-12">
        <div class="p-3" style="background-color: #262525;">
            <p class="text-danger text-uppercase text-center mb-1">Parece que olvidaste algo</p>
            <h1 class="modal__title text-uppercase text-center mb-5">Restablecer contraseña</h1>

            <form action="{{ route('password.request') }}" method="POST"
                id="form-reset" class="form-custom form-modal">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="text-uppercase">* @lang('E-Mail')</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="small text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="reset-password" class="text-uppercase">* @lang('Password')</label>
                    <input type="password" name="password" id="reset-password" class="form-control" required>

                    @if ($errors->has('password'))
                        <span class="small text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="reset-password-confirmation" class="text-uppercase">* @lang('Password confirmation')</label>
                    <input type="password" name="password_confirmation" id="reset-password-confirmation" class="form-control" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="small text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox mt-1">
                        <label class="text-uppercase">
                            <input type="checkbox" id="toggle-reset-password" > @lang('View password')
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>
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
