<div class="row mb-4">
    <div class="col-md-6" id="form-request">
        <span class="font-akshar banner-first-span">CURSO DE</span><br>

        <h1 class="font-besley-medium banner-h1">
            Planeación del retiro <br>
        </h1>

        <h1 class="font-besley-medium banner-h1 banner-h1-label-yellow">
            <span class="bg-yellow">para tu equipo</span>
        </h1>

        <p class="font-akshar font-size-quote banner-first-quote">
            Apoya a tus empleados en su desarrollo personal y profesional
        </p>
        <div class="col-md-6 d-none d-xs-block" style="position: relative;">
            <img src="{{ asset('images/landing/retiro/gifs/ilustracion.png')}}" width="100%" alt="Ilustracion"
                style="position: relative; z-index: 1;">

            <img src="{{ asset('images/landing/retiro/gifs/circulo-girando-v2.gif')}}" class="img-ilustracion-more-gif" alt="Gif Circulo Girando">
        </div>
        <form action="{{ url('landing/retiro/store') }}" method="POST" class=" movil-form-center">

            @csrf

            <input type="hidden" name="interests" value="Curso de Planeación del retiro para tu equipo">
            <input type="hidden" name="form" value="landing/retiro">

            <div class="row pl-2 pt-2 pb-3 font-akshar">
                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <input type="text" name="name" placeholder="Nombre (s)" class="form-control form-control-lg"
                        required="required">
                    @if ($errors->has('name'))
                    <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <input type="text" name="last_name" placeholder="Apellido (s)" class="form-control form-control-lg"
                        required="required">
                    @if ($errors->has('last_name'))
                    <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <input type="email" name="mail_corporate" placeholder="E-mail de trabajo"
                        class="form-control form-control-lg" required="required">
                    @if ($errors->has('mail_corporate'))
                    <span class="small text-danger">{{ $errors->first('mail_corporate') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <input type="tel" name="movil" placeholder="Celular" class="form-control form-control-lg"
                        required="required">
                    @if ($errors->has('movil'))
                    <span class="small text-danger">{{ $errors->first('movil') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <input type="text" name="company" placeholder="Nombre de la empresa"
                        class="form-control form-control-lg" required="required">
                    @if ($errors->has('company'))
                    <span class="small text-danger">{{ $errors->first('company') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp mb-2">
                    <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                    @if ($errors->has('g-recaptcha-response'))
                    <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>

                <div class="col-12 padding-custom-regis-qdp banner-align-btn">
                    <button type="submit" class="btn btn-dark text-uppercase font-weight-bold p-3 p-lg-3 mb-2">
                        SOLICITAR COTIZACIÓN
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6 d-none d-sm-block" style="position: relative;">
        <img src="{{ asset('images/landing/retiro/gifs/ilustracion.png')}}" width="100%" alt="Ilustracion"
            style="position: relative; z-index: 1;" class="img-ilustration-banner">
        <img src="{{ asset('images/landing/retiro/gifs/circulo-girando-v2.gif')}}" class="img-ilustracion-more-gif"
            alt="Gif Circulo Girando">
    </div>
</div>
