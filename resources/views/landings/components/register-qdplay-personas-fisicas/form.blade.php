<form action="{{ route('register.qdplay.personas.fisicas.store') }}" method="POST" class=" movil-form-center">

    @csrf

    <div class="row pt-2 pb-3">
        <div class="col-12 padding-custom-regis-qdp">
            <input type="text" name="name" placeholder="Nombre" class="form-control form-control-lg" required="required">
            @if ($errors->has('name'))
                <span class="small text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="text" name="last_name" placeholder="Apellido" class="form-control form-control-lg" required="required">
            @if ($errors->has('last_name'))
                <span class="small text-danger">{{ $errors->first('last_name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <input type="email" name="mail" placeholder="Correo electrónico" class="form-control form-control-lg" required="required">
            @if ($errors->has('mail'))
                <span class="small text-danger">{{ $errors->first('mail') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp">
            <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

            @if ($errors->has('g-recaptcha-response'))
                <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>

        <div class="col-12 text-left padding-custom-regis-qdp">
            <button type="submit" class="btn btn-pill btn-dark text-uppercase font-weight-bold p-3 p-lg-3 mb-2">
                NOTIFÍCAME DEL LANZAMIENTO
            </button>
            <!--<input type="submit" value="Enviar" class="tag border-0 p-2 p-lg-3 bg-green-blue text-white text-uppercase">-->
        </div>
    </div>
</form>
