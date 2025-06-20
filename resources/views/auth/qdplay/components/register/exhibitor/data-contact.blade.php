<div id="register-wrapper">
    <div id="register-form">
        <form action="{{ route('register.store') }}" method="POST"
            id="form-register" class="form-custom form-modal">
            @csrf

            <div id="register-general">
                @include('auth.qdplay.components.register.exhibitor.data-general')
            </div>
            {{--
            <div id="register-contact">
                @include('auth.qdplay.components.register.exhibitor.data-contact')
            </div>

            <div id="register-interests">
                @include('auth.qdplay.components.register.exhibitor.data-contact')
            </div>--}}
        </form>
    </div>

    <div class="text-center">
        <p class="text-white text-xsmall mb-0">Al registrarte estás aceptando nuestros</p>
            <a href="{{ route('terms') }}" target="_blank" class="text-white text-underline text-xsmall">Términos y Condiciones</a>
        </p>
    </div>
</div>
{{--
<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name" class="text-uppercase">* @lang('First Name')</label>
                <input type="text" name="name" class="form-control">

                @if ($errors->has('name'))
                    <span class="small text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="last_name" class="text-uppercase">* @lang('Last Name')</label>
                <input type="text" name="last_name" class="form-control">

                @if ($errors->has('last_name'))
                    <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email" class="text-uppercase">* @lang('E-Mail')</label>
                <input type="email" name="email" class="form-control">

                @if ($errors->has('email'))
                    <span class="small text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="register-password" class="text-uppercase">* @lang('Password')</label>
                <input type="password" name="password" id="register-password" class="form-control">

                @if ($errors->has('password'))
                    <span class="small text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="register-password-confirmation" class="text-uppercase">* @lang('Password confirmation')</label>
                <input type="password" name="password_confirmation" id="register-password-confirmation" class="form-control">

                @if ($errors->has('password_confirmation'))
                    <span class="small text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" id="toggle-register-password" > @lang('View password')
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="gender" class="text-uppercase mb-2">* @lang('Gender')</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <label>
                            <span class="custom-control-description">@lang('Male')</span>
                            <input type="radio" name="gender" value="male">
                            <span class="custom-control-indicator float-right"></span>
                        </label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <label>
                            <span class="custom-control-description">@lang('Female')</span>
                            <input type="radio" name="gender" value="female">
                            <span class="custom-control-indicator float-right"></span>
                        </label>
                    </div>
                </div>

                @if ($errors->has('gender'))
                    <span class="small text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>


        <div class="col-lg-6">
            <div class="form-group">
                <label for="countrycode" class="text-uppercase"> @lang('Country Code') </label>
                <select name="countrycode"
                    id="user-countrycode" class="form-control">
                    @foreach (cache()->get('countries.json') as $country)
                        <option value="{{ $country->dial_code }}">{{ $country->name }} {{ $country->dial_code }}</option>
                    @endforeach
                </select>

                @if ($errors->has('countrycode'))
                    <span class="small text-danger">{{ $errors->first('countrycode') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="whatsapp" class="text-uppercase"> @lang('Whatsapp')</label>
                <input type="text" name="whatsapp" class="form-control">

                @if ($errors->has('whatsapp'))
                    <span class="small text-danger">{{ $errors->first('whatsapp') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="state" class="text-uppercase">* @lang('State')</label>
                <select name="state"
                    id="user-state" class="form-control">
                    @foreach (cache()->get('states.json') as $state)
                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('state'))
                    <span class="small text-danger">{{ $errors->first('state') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="birthdate" class="text-uppercase">* @lang('Birth Date')</label>
                <input type="date" name="birthdate"
                    id="user-birthdate" class="form-control datetimepicker-input"
                    data-target="#user-birthdate" data-toggle="datetimepicker">

                @if ($errors->has('birthdate'))
                    <span class="small text-danger">{{ $errors->first('birthdate') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox mt-1">
                    <label class="text-uppercase">
                        <input type="checkbox" name="newsletter" value="1" checked> Acepto contrato de prestación de servicios
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
                <p class="m-0">
                    <a href="{{ route('privacy') }}" target="_blank" class="text-white text-underline text-small">Consulta nuestro aviso de privacidad</a>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group mx-auto">
        <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

        @if ($errors->has('g-recaptcha-response'))
            <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
        @endif
    </div>

    <p class="small font-italic">
        (*) @lang('The field is required')
    </p>

    <div class="form-group text-center">
        <button type="button" id="next" class="btn btn-danger btn-pill">@lang('Next')</button>
    </div>
</div>
--}}
