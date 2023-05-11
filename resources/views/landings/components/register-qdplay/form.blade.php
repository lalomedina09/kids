<form action="{{ route('register.qdplay.store') }}" method="POST" class=" movil-form-center">

    @csrf

    <div class="row pl-2 pt-2 pb-3">
        <div class="col-12 padding-custom-regis-qdp">
            <input type="text" name="name" placeholder="Nombre (s)" class="form-control form-control-lg" required="required">
            @if ($errors->has('name'))
                <span class="small text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="text" name="last_name" placeholder="Apellido (s)" class="form-control form-control-lg" required="required">
            @if ($errors->has('last_name'))
                <span class="small text-danger">{{ $errors->first('last_name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="email" name="mail_corporate" placeholder="E-mail de trabajo" class="form-control form-control-lg" required="required">
            @if ($errors->has('mail_corporate'))
                <span class="small text-danger">{{ $errors->first('mail_corporate') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="tel" name="movil" placeholder="Celular" class="form-control form-control-lg" required="required">
            @if ($errors->has('movil'))
                <span class="small text-danger">{{ $errors->first('movil') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="text" name="company" placeholder="Nombre de la empresa" class="form-control form-control-lg" required="required">
            @if ($errors->has('company'))
                <span class="small text-danger">{{ $errors->first('company') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

            @if ($errors->has('g-recaptcha-response'))
                <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>

        <div class="col-12 text-center padding-custom-regis-qdp">
            <button type="submit" class="btn btn-pill btn-dark text-uppercase font-weight-bold p-3 p-lg-3 mb-2">
                MÁS INFORMACIÓN
            </button>
            <!--<input type="submit" value="Enviar" class="tag border-0 p-2 p-lg-3 bg-green-blue text-white text-uppercase">-->
        </div>
    </div>
</form>
