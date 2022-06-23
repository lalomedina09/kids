@push('scripts')
    <script type="text/javascript" src="{{ mix('js/auth/login.js') }}"></script>
@endpush

<p class="text-danger text-uppercase text-center mb-0">¡Te extrañábamos!</p>
<p class="modal__title text-uppercase text-center mb-5">Bienvenido</p>

<form action="{{ route('login') }}" method="POST"
    id="form-login" class="form-custom form-modal">
    @csrf

    <div class="form-group">
        <label for="login-email" class="text-uppercase">* @lang('E-Mail')</label>
        <input type="email" name="email" id="login-email" class="form-control">
        @if ($errors->has('email'))
            <span class="small text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="login-password" class="text-uppercase">* @lang('Password')</label>
        <input type="password" name="password" id="login-password" class="form-control">
        @if ($errors->has('password'))
            <span class="small text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox mt-1">
            <label class="text-uppercase">
                <input type="checkbox" id="toggle-login-password" > @lang('View password')
                <span class="custom-control-indicator"></span>
            </label>
        </div>
    </div>

    <p class="small font-italic">
        (*) @lang('The field is required')
    </p>

    <div class="text-center mt-4">
        <input type="submit" name="submit" value="@lang('Login')" class="btn btn-danger btn-pill">
    </div>
</form>

<p class="text-center my-3">
    <a href="{{ route('password.request') }}" class="text-white text-underline text-xsmall">
        @lang('Forgot Your Password?')
    </a>
</p>

<div class="text-center">
    <p class="text-white text-xsmall mb-0">Al iniciar sesión estás aceptando nuestros</p>
        <a href="{{ route('terms') }}" target="_blank" class="text-white text-underline text-xsmall">Términos y Condiciones</a>
    </p>
</div>

<hr>

<div class="text-center">
    <p class="text-white">¿No estás registrado aún?</p>
    <a href="{{ route('register') }}" class="btn btn-pill btn-danger">Registrate aquí</a>
</div>
