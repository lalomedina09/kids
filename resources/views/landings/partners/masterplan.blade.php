@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/masterplan/bg.jpg);min-height:92vh;height:auto;">
        <div class="overlay"></div>
        <div class="container h-100" style="padding: 10vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger"><br>Créditos y Financiamiento <br> Educativo Personalizado</h1>
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/masterplan/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">No necesitas garantía hipotecaria
ni pagar comisiones</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/masterplan/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Requieres estar estudiando y contar
con comprobantes de ingresos</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/masterplan/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Recuerda que un crédito no es una beca</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <img src="{{ asset('images/landing/masterplan/logo.png') }}" alt="Master Plan" width="70%">
                                <p class="text-white text-bold">Partner oficial</p>
                                <p class="text-white text-bold text-center">Aplica <span class="text-danger"> gratis </span> aquí</p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="Nombre"
                                        id="name" class="form-control"
                                        placeholder="Nombre Completo">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="Celular"
                                        id="phone" class="form-control"
                                        placeholder="Celular">
                                </div>

                                <div class="form-group">
                                    <select name="Nivel"
                                        id="Nivel" class="form-control">
                                        <option value="">¿Para qué nivel de estudio aplicarás?</option>
                                        <option value="Licenciatura">Licenciatura</option>
                                        <option value="Maestría">Maestría</option>
                                        <option value="Diplomado">Diplomado</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="Situacion"
                                        id="Nivel" class="form-control">
                                        <option value="">Situación actual:</option>
                                        <option value="Voy a comenzar mis estudios">Voy a comenzar mis estudios</option>
                                        <option value="Ya estoy estudiando">Ya estoy estudiando</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="Donde"
                                        id="Nivel" class="form-control">
                                        <option value="">¿Dónde quieres estudiar?</option>
                                        <option value="México">México</option>
                                        <option value="Extranjero">Extranjero</option>
                                    </select>
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-danger">Solicitar información</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="container">
        <section>

            <div class="row mb-4">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/landing/masterplan/a.png') }}" alt="" width="80%" class="mb-3">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <h2 class="text-center text-bold mb-4">Créditos educativos con tasas de interés <span class="text-danger">realmente bajas</span></h2>
                    <h3 class="text-bold mb-4">Te ofrecemos:</h3>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <img src="{{ asset('images/landing/masterplan/chk.png') }}" width="40" class="mr-2">
                        <h4 class="font-weight-light mb-0">Plan personalizado de acuerdo a
tu situación particular. Puedes
solicitar un crédito para el pago
de toda la colegiatura o para un
periodo</h4>
                    </div>

                </div>
            </div>

            <hr>
        </section>

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">Beneficios</h1>

            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/masterplan/1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Puedes aplicar al
crédito</span> antes de
comenzar tus estudios
o si ya los estás cursando</h4>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/masterplan/2.png') }}" alt="Tasas" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Bajas tasas de interés,</span>
sin comisiones</h4>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/masterplan/3.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">El monto del crédito</span> se
adapta a tus necesidades
y situación particular</h4>
                </div>
            </div>

            <hr>
        </section>

        
        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger mb-5">Que nada detenga tus sueños,
<br><span class="text-danger">nosotros te ayudamos</span></h1>

                <img src="{{ asset('images/landing/masterplan/f.png') }}" alt="" width="520">
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center">
           <!--  <p class="text-bold text-danger mb-2">¡Checa las redes de Master Plan!</p>

            <p class="mb-0">
                <a target="blank" href="https://www.masterplandigital.com/posgrados/creditos-educativos/" title="web">
                    <img src="{{ asset('images/landing/masterplan/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>

@endsection
