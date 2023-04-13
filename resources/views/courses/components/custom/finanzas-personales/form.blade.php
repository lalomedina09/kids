<form action="{{ route('courses.register.form.email-corp') }}" method="POST" class=" movil-form-center">

    @csrf

    <input type="hidden" name="interests" value=" Curso de Finanzas Personales Landing 2">
    <input type="hidden" name="form" value="finanzas-empleados">

    <div class="row pl-2 pt-2 pb-3">
        <div class="col-12 padding-custom-regis-qdp text-left">
            <label for="name" class="text-left">Nombre:</label>
            <input type="text" name="name" class="form-control form-control-lg" required="required">
            @if ($errors->has('name'))
                <span class="small text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp text-left">
            <label for="name" class="text-left">Apellido:</label>
            <input type="text" name="last_name" class="form-control form-control-lg" required="required">
            @if ($errors->has('last_name'))
                <span class="small text-danger">{{ $errors->first('last_name') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp text-left">
            <label for="name" class="text-left">Email de trabajo:</label>
            <input type="email" name="mail_corporate" class="form-control form-control-lg" required="required">
            @if ($errors->has('mail_corporate'))
                <span class="small text-danger">{{ $errors->first('mail_corporate') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp text-left">
            <label for="name" class="text-left">Celular:</label>
            <input type="tel" name="movil" class="form-control form-control-lg" required="required">
            @if ($errors->has('movil'))
                <span class="small text-danger">{{ $errors->first('movil') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp text-left">
            <label for="name" class="text-left">Nombre de la empresa:</label>
            <input type="text" name="company" class="form-control form-control-lg" required="required">
            @if ($errors->has('company'))
                <span class="small text-danger">{{ $errors->first('company') }}</span>
            @endif
        </div>

        <div class="col-12 padding-custom-regis-qdp text-center mt-3 mb-3">
            <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

            @if ($errors->has('g-recaptcha-response'))
                <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>

        <div class="col-12 text-center padding-custom-regis-qdp">
            <button type="submit" class="btn btn-pill btn-dark text-uppercase font-weight-bold mb-2">
                SOLICITAR COTIZACIÓN
            </button>
            <!--<input type="submit" value="Enviar" class="tag border-0 p-2 p-lg-3 bg-green-blue text-white text-uppercase">-->
        </div>
    </div>
</form>
