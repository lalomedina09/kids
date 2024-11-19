<style>
    .modal .modal-content {
        background-color: #f8f8f8;
        border-radius: 10px;
        padding: 40px 0;
        color: #000000;
    }

    .form-modal {
        color: #000000;
    }

    .form-custom input:not(.btn) {
        background-color: transparent !important;
        border-bottom: 1px solid #9B9B9B;
        border-left: none;
        border-radius: 0;
        border-right: none;
        border-top: none;
        color: #000000 !important;
        outline: none;
        padding: 5px 0;
        width: 100%;
    }

    .form-custom input:focus {
        border-bottom: 1px solid #9B9B9B;
    }

    .form-custom input:-webkit-autofill {
        -webkit-text-fill-color: #262525 !important;
    }

    .custom-control-indicator {
        border: 1px solid #262525;
    }

    .custom-control input:checked~.custom-control-indicator {
        background-color: #262525;
        border-color: #262525;
        box-shadow: none;
    }

    .btn-login-v2 {
        background: #000000;
        border-radius: 5px;
        padding: 10px 20px;
    }

    .btn-login-v2:hover {
        background: #000000;
        border-radius: 5px;
        padding: 12px 24px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!--------------------------------------------->
                <div class="row">
                    <div class="col-12">
                        <div class="" style="background-color: #f8f8f8; color: #000000;">
                            @push('scripts')
                            <script type="text/javascript" src="{{ mix('js/auth/login.js') }}"></script>
                            @endpush
                            <div class="text-center mb-4">
                                <h4 class="modal-title text-family-akshar" style="font-weight: 400; letter-spacing: 5px; font-size: x-large;"
                                    id="exampleModalLabel">
                                    ¡Te extrañabamos!
                                </h4>
                                <h2 class="text-family-akshar" style="font-size: x-large;">BIENVENID@</h2>
                                <br><br><br>
                            </div>

                            <form action="{{ route('qdplay-login') }}" method="POST" id="form-login"
                                class="form-custom form-modal mb-4">
                                @csrf
                                <input type="hidden" name="source" value="{{ $source }}">
                                <input type="hidden" name="channel" value="{{ $channel }}">
                                <div class="form-group text-family-akshar">
                                    <label for="login-email" class="text-uppercase">* @lang('E-Mail')</label>
                                    <input type="email" name="email" id="login-email" class="form-control">
                                    @if ($errors->has('email'))
                                    <span class="small text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group text-family-akshar">
                                    <label for="login-password" class="text-uppercase">* @lang('Password')</label>
                                    <input type="password" name="password" id="login-password" class="form-control">
                                    @if ($errors->has('password'))
                                    <span class="small text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group text-family-akshar">
                                    <div class="custom-control custom-checkbox mt-1">
                                        <label class="text-uppercase">
                                            <input type="checkbox" id="toggle-login-password"> @lang('View password')
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>

                                <p class="small font-italic text-family-akshar">
                                    (*) @lang('The field is required')
                                </p>

                                <div class="text-center mt-4 text-family-akshar">
                                    <input type="submit" name="submit" value="@lang('Login')"
                                        class="btn bg-green-blue btn-login-v2">
                                </div>
                            </form>

                            <p class="text-center text-family-akshar my-3">
                                <a href="{{ route('password.request') }}" class=" text-underline text-xsmall text-dark">
                                    @lang('Forgot Your Password?')
                                </a>
                            </p>

                            @include('partials.auth.social_media_logins_v2', array('track_client' => $source))
                            <br>
                            <hr style="width: 70%; border-top: 1px solid #000; margin: 0 auto;">
                            <div class="text-center mt-4 text-family-akshar">
                                <p class="">¿No estás registrado aún?</p>
                                <a href="{{-- route('register') --}}#" class="btn btn-pill bg-green-blue btn-login-v2"
                                    id="btn-open-modal-register" data-toggle="modal" data-target="#modalSignUp">
                                    Registrate aquí
                                </a>

                                <div class="text-center text-family-akshar mt-4">
                                    <p class=" text-xsmall mb-0 text-dark">Al iniciar sesión estás aceptando nuestros
                                    </p>
                                    <a href="{{ route('terms') }}" target="_blank"
                                        class=" text-underline text-xsmall text-dark text-bold">
                                        Términos y Condiciones
                                    </a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--------------------------------------------->
            </div>
        </div>
    </div>
</div>
