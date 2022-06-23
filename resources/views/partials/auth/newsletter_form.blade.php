@push('scripts')
    <script type="text/javascript" src="{{ mix('js/auth/newsletter.js') }}"></script>
@endpush

<p class="modal__title text-uppercase text-center mb-5">Suscribirme al newsletter</p>

<form action="{{ route('newsletter.store') }}" method="post"
    id="form-newsletter" class="form-custom form-modal">
    @csrf

    <div class="form-group">
        <label for="newsletterFirstName" class="text-uppercase">* @lang('First Name')</label>
        <input type="text" name="first_name"
            id="newsletterFirstName" class="form-control"
            @auth value="{{ auth()->user()->name }}" readonly="readonly" @endauth>

        @if ($errors->has('first_name'))
            <span class="small text-danger">{{ $errors->first('first_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="newsletterLastName" class="text-uppercase">* @lang('Last Name')</label>
        <input type="text" name="last_name"
            id="newsletterLastName" class="form-control"
            @auth value="{{ auth()->user()->last_name }}" readonly="readonly" @endauth>

        @if ($errors->has('last_name'))
            <span class="small text-danger">{{ $errors->first('last_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="newsletterEmail" class="text-uppercase">* @lang('E-Mail')</label>
        <input type="email" name="email"
            id="newsletterEmail" class="form-control"
            @auth value="{{ auth()->user()->email }}" readonly="readonly" @endauth>

        @if ($errors->has('email'))
            <span class="small text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="newsletterState" class="text-uppercase">* @lang('State')</label>
        <select name="state"
            id="newsletterState" class="form-control">
            @foreach (cache()->get('states.json') as $state)
                <option value="{{ $state->name }}">{{ $state->name }}</option>
            @endforeach
        </select>

        @if ($errors->has('state'))
            <span class="small text-danger">{{ $errors->first('state') }}</span>
        @endif
    </div>

    <div class="form-group">
        <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

        @if ($errors->has('g-recaptcha-response'))
            <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
        @endif
    </div>

    <p class="small font-italic">
        (*) @lang('The field is required')
    </p>

    <div class="text-center mt-4">
        <input type="submit" name="submit" value="Suscribirme" class="btn btn-danger btn-pill">
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('privacy') }}" target="_blank" class="text-white text-underline text-small">Consulta nuestro aviso de privacidad</a>
    </div>
</form>
