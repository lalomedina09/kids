<div class="image-background pt-5 pb-1">
	<section>
        <div class="container">
            <div class="row text-center" style="margin-right: 0px; margin-left: 0px;">
                <div class="col-md-6 col-xs-12 col-sm-12 col-12 p-0">
                    <h2 class="mb-3 pt-3 text-black font-weight-normal title-underline title-underline-b title-underline-left-black banner-title-course" style="font-size: 3rem;">
                        <b>Curso de </b> <br>
                        <span class="font-weight-bold text-danger banner-title-course">Finanzas Personales</span> <br>
                        <b>para tu equipo</b>
                    </h2>
                    <br>
                    <div class="row">
                        <div class="col-md-12 bg-portada-taller">
                            <div class="row">
                                <p class="font-weight-normal text-black col-xs-12 col-sm-12 col-md-8 col-lg-8 banner-subtitle-course">
                                    Apoya a tus empleados
                                    en su desarrollo tanto personal
                                    como profesional.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12 col-12">
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
                                <label for="name" class="text-left">Celular (10 digitos):</label>
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
                </div>
            </div>
        </div>
	</section>
</div>
