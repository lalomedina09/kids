@push('styles')
<link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/auth/register.js') }}"></script>
@endpush
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

    .form-custom input:hover {
        border-bottom: 1px solid #9B9B9B;
    }

    .custom-control-indicator {
        border: 1px solid #262525;
    }

    .form-custom input:not(.btn):hover,
    .form-custom input:not(.btn):focus,
    .form-custom input:not(.btn):active,
    .form-custom input:not(.btn):visited {
        border-bottom: 1px solid #262525;
        box-shadow: none;
        outline: none;
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
<div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('qdplay.register.store') }}" method="POST" id="form-register"
                    class="form-custom form-modal">
                    @csrf
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <!--<h4 class="modal-title font-akshar" style="font-weight: 400; letter-spacing: 5px;" id="exampleModalLabel">
                                    ¡Te extrañabamos!
                                </h4>-->
                                <h2 class="font-akshar">
                                    ¡Registrate Gratis!
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!--------------- row ----------------->
                    <input type="hidden" name="gender" value="undefined" class="form-control">
                    <input type="hidden" name="countrycode" value="+52" class="form-control">
                    {{--<input type="hidden" name="whatsapp" value="1231231231" class="form-control">--}}
                    <input type="hidden" name="state" value="No soy de México" class="form-control">
                    <input type="hidden" name="birthdate" value="01/01/2000" class="form-control">
                    <input type="hidden" name="source" value="{{ $source }}">
                    <input type="hidden" name="channel" value="{{ $channel }}">
                    <!------------------------------------->
                    <!-- row -->
                    <div class="row font-akshar ml-2 mr-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name" class="text-uppercase">* @lang('First Name')</label>
                                <input type="text" name="name" class="form-control">

                                @if ($errors->has('name'))
                                <span class="small text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="last_name" class="text-uppercase">* @lang('Last Name')</label>
                                <input type="text" name="last_name" class="form-control">

                                @if ($errors->has('last_name'))
                                <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email" class="text-uppercase">* @lang('E-Mail')</label>
                                <input type="email" name="email" class="form-control">

                                @if ($errors->has('email'))
                                <span class="small text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="whatsapp" class="text-uppercase"> @lang('Phone') o @lang('WhatsApp')</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="10 digitos">

                                @if ($errors->has('whatsapp'))
                                <span class="small text-danger">{{ $errors->first('whatsapp') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="register-password" class="text-uppercase">* @lang('Password')</label>
                                <input type="password" name="password" id="register-password" class="form-control">

                                @if ($errors->has('password'))
                                <span class="small text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="register-password-confirmation" class="text-uppercase">
                                    * @lang('Password confirmation')</label>
                                <input type="password" name="password_confirmation" id="register-password-confirmation"
                                    class="form-control">

                                @if ($errors->has('password_confirmation'))
                                <span class="small text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mt-1">
                                    <label class="text-uppercase">
                                        <input type="checkbox" id="toggle-register-password"> @lang('View password')
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </div>
                                <p class="small font-italic mt-4">
                                    (*) @lang('The field is required')
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-theme="dark"
                                        data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group text-center">

                                <button type="submit"
                                    class="btn btn-danger btn-pill btn-login-v2">@lang('Registrarme')</button>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="text-center font-akshar mt-2">
                                <p class=" text-xsmall mb-0 text-dark">Al registrarte estás aceptando nuestros</p>
                                <a href="{{ route('terms') }}" target="_blank"
                                    class=" text-underline text-xsmall text-dark text-bold">
                                    Términos y Condiciones
                                </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
