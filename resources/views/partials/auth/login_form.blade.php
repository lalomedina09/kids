@push('scripts')
    <script type="text/javascript" src="{{ mix('js/auth/login.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/auth/register.js') }}"></script>
@endpush

<p class="text-danger text-uppercase text-center mb-0 mt-4 text-family-akshar" style="font-size: xx-large;">¡Te extrañábamos!</p>
<p class="modal__title text-uppercase text-center mb-5 text-family-akshar text-white mt-2" style="font-size: xx-large;">Bienvenido</p>

<form action="{{ route('login') }}" method="POST"
    id="form-login" class="form-custom form-modal">
    @csrf

    <div class="form-group">
        <label for="login-email" class="text-uppercase text-family-akshar text-white mb-2">* @lang('E-Mail')</label>
        <input type="email" name="email" id="login-email" class="form-control">
        @if ($errors->has('email'))
            <span class="small text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="login-password" class="text-uppercase text-family-akshar text-white mb-2">* @lang('Password')</label>
        <input type="password" name="password" id="login-password" class="form-control">
        @if ($errors->has('password'))
            <span class="small text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox mt-1">
            <label class="text-uppercase text-family-akshar text-white">
                <input type="checkbox" id="toggle-login-password" > @lang('View password')
                <span class="custom-control-indicator"></span>
            </label>
        </div>
    </div>

    <p class="small font-italic text-family-akshar">
        (*) @lang('The field is required')
    </p>

    <div class="text-center mt-4">
        <input type="submit" name="submit" value="@lang('Login')" class="btn btn-danger btn-pill text-family-akshar">
    </div>
</form>

<p class="text-center my-3">
    <a href="{{ route('password.request') }}" class="text-white text-underline text-xsmall text-family-akshar">
        @lang('Forgot Your Password?')
    </a>
</p>

<div class="text-center">
    <p class="text-white text-xsmall mb-0 text-family-akshar">Al iniciar sesión estás aceptando nuestros</p>
        <a href="{{ route('terms') }}" target="_blank" class="text-white text-underline text-xsmall text-family-akshar">Términos y Condiciones</a>
    </p>
</div>

@include('partials.auth.social_media_logins')

<hr>

<div class="text-center">
    <p class="text-white text-family-akshar mb-2">¿No estás registrado aún?</p>
    <a href="{{ route('register') }}" class="btn btn-pill btn-danger text-family-akshar">Registrate aquí</a>
</div>
