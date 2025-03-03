@push('styles')
    <link href="{{ mix('css/vendor/datetimepicker.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/moment.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/auth/register.js') }}"></script>
@endpush

<style>
    #register-form{
        width: 100%;
    }
</style>
<div class="container">

    <div id="register-wrapper ">
        <div id="" class="mt-4">
            <form action="{{ route('qdplay.register.store') }}" method="POST" id="form-register" class="form-custom form-modal">
                @csrf
                <!-- row -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                            <h4 class="modal-title text-family-akshar text-white text-center" style="font-weight: 400; letter-spacing: 5px;" id="exampleModalLabel">
                                ¡Regístrate Gratis!
                            </h4>
                            <br>
                    </div>
                </div>
                <!--------------- row ----------------->
                <input type="hidden" name="gender" value="undefined" class="form-control">
                <input type="hidden" name="countrycode" value="+52" class="form-control">
                {{--<input type="hidden" name="whatsapp" value="1231231231" class="form-control">--}}
                <input type="hidden" name="state" value="No soy de México" class="form-control">
                <input type="hidden" name="birthdate" value="01/01/2000" class="form-control">
                @if (isset($source) && isset($channel))
                    <input type="hidden" name="source" value="{{ $source }}">
                    <input type="hidden" name="channel" value="{{ $channel }}">
                @else
                    <input type="hidden" name="source" value="Uknow">
                    <input type="hidden" name="channel" value="Uknow">
                @endif
                <!------------------------------------->
                <!-- row -->
                <div class="row text-family-akshar">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="text-uppercase text-white">* @lang('First Name')</label>
                            <input type="text" name="name" class="form-control">

                            @if ($errors->has('name'))
                            <span class="small text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="last_name" class="text-uppercase text-white">* @lang('Last Name')</label>
                            <input type="text" name="last_name" class="form-control">

                            @if ($errors->has('last_name'))
                            <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email" class="text-uppercase text-white">* @lang('E-Mail')</label>
                            <input type="email" name="email" class="form-control">

                            @if ($errors->has('email'))
                            <span class="small text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="whatsapp" class="text-uppercase text-white"> @lang('Phone') o @lang('WhatsApp')</label>
                            <input type="text" name="whatsapp" class="form-control" placeholder="10 digitos">

                            @if ($errors->has('whatsapp'))
                            <span class="small text-danger">{{ $errors->first('whatsapp') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="register-password" class="text-uppercase text-white">* @lang('Password')</label>
                            <input type="password" name="password" id="register-password" class="form-control">

                            @if ($errors->has('password'))
                            <span class="small text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="register-password-confirmation" class="text-uppercase text-white">
                                * @lang('Password confirmation')</label>
                            <input type="password" name="password_confirmation" id="register-password-confirmation"
                                class="form-control">

                            @if ($errors->has('password_confirmation'))
                            <span class="small text-danger text-white">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox mt-1">
                                <label class="text-uppercase text-white">
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
                                <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                @if ($errors->has('g-recaptcha-response'))
                                <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="btn-register form-group text-center">
                            <button type="submit" class="btn btn-pill btn-login-v2 btn-danger px-4 py-2" style="color: aliceblue;">
                                @lang('Registrarme')
                            </button>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <!-- Contenedor para pantallas grandes -->
                        <div class="register-btn text-family-akshar mt-2 d-none d-md-block" style="text-align: center;">
                            <p class="text-xsmall mb-0 text-white">
                                Al registrarte estás aceptando nuestros
                            </p>
                            <a href="{{ route('terms') }}" target="_blank" class="text-underline text-xsmall text-white text-bold">
                                Términos y Condiciones
                            </a>
                        </div>

                        <!-- Contenedor para pantallas móviles -->
                        <div class="register-btn text-family-akshar mt-2 d-block d-md-none text-start ms-5" style="text-align: center;">
                            <p class="text-xsmall mb-0 text-white">
                                Al registrarte estás aceptando nuestros
                            </p>
                            <a href="{{ route('terms') }}" target="_blank" class="text-underline text-xsmall text-white text-bold">
                                Términos y Condiciones
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        @include('partials.auth.social_media_logins')
                    </div>

                    <br><br>
                </div>
            </form>
        </div>
    </div>
</div>
