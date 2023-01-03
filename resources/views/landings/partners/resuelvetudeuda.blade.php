@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/resuelvetudeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/resuelvetudeuda/bg.jpg);">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger mb-3">Paga hasta <span class="text-white">70% menos</span> en deudas</h1>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <img src="{{ asset('images/landing/resuelvetudeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Fija tus propias mensualidades</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <img src="{{ asset('images/landing/resuelvetudeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Liquida sin más créditos</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-2">
                            <img src="{{ asset('images/landing/resuelvetudeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Consulta tu caso en forma gratuita</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <img src="{{ asset('images/landing/resuelvetudeuda/logo.png') }}" alt="Resuelve Tu Deuda" width="60%">
                                <p class="text-white text-bold">Partner oficial</p>
                                <p class="text-white text-bold text-center">Déjanos tus datos y recibe una asesoría <span class="text-secondary">sin costo</span></p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="names"
                                        id="names" class="form-control"
                                        placeholder="Nombre(s)"
                                        value="{{ old('names') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="first_surname"
                                        id="first_surname" class="form-control"
                                        placeholder="Apellido(s)"
                                        value="{{ old('first_surname') }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="mobile"
                                        id="mobile" class="form-control"
                                        placeholder="Teléfono celular"
                                        value="{{ old('mobile') }}">
                                </div>

                                <div class="form-group">
                                    <input type="number" name="debt_amount"
                                        id="debt_amount" class="form-control"
                                        placeholder="Cantidad de deuda en pesos mexicanos"
                                        min="35000" max="{{ PHP_INT_MAX }}"
                                        value="{{ old('debt_amount') }}">
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-danger">Asesoría Gratis</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <section>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/resuelvetudeuda/1.png') }}" alt="Apoyo" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Cómo te ayudamos</h4>
                    <p class="font-weight-lighter">Cuando te registras un coach te contacta para estudiar tu caso y diseñar contigo un plan de ahorro a tu medida.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/resuelvetudeuda/2.png') }}" alt="Descuento" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Conseguimos el mejor descuento para ti</h4>
                    <p class="font-weight-lighter">Mientras ahorras mensualmente negociamos con tus acreedores por ti para que liquides tus deudas pagando menos.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/resuelvetudeuda/3.png') }}" alt="Asesoría" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Nunca estarás solo</h4>
                    <p class="font-weight-lighter">Tendrás a tu disposición todo un equipo de coaches para aclarar dudas y saber qué hacer en todo momento.</p>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Asesoría de expertos en todo momento</h1>
            </div>

            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/resuelvetudeuda/a.png') }}" alt="Ayuda" width="80%">
                    <p class="text-bold">Hemos ayudado a liquidar más de <span class="text-danger">175,000 deudas</span></p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/resuelvetudeuda/b.png') }}" alt="Experiencia" width="80%">
                    <p class="text-bold">Somos la primer reparadora de México con más de <span class="text-danger">10 años de experiencia</span></p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/resuelvetudeuda/c.png') }}" alt="Sucursales" width="80%">
                    <p class="text-bold">21 sucursales en <span class="text-danger">México, Colombia y España</span></p>
                </div>
            </div>
            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Cada deuda es distinta <br> Por eso diseñamos un plan personalizado</h1>

                <img src="{{ asset('images/landing/resuelvetudeuda/q.gif') }}" alt="Testimonios" width="150">
            </div>

            <div id="testimonies" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#testimonies" data-slide-to="0" class="bg-danger active"></li>
                    <li data-target="#testimonies" data-slide-to="1" class="bg-danger"></li>
                    <li data-target="#testimonies" data-slide-to="2" class="bg-danger"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p class="text-bold">"Ya terminé de pagar, gracias Resuelve tu Deuda salí adelante."</p>
                                <p class="text-bold text-uppercase">Fermín debía <span class="text-danger">$65,369</span> y liquidó con tan solo <span class="text-danger">$18,397</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item text-center">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p class="text-bold">"Gracias por la oportunidad de tener una vida tranquila. Ya no tengo deudas, soy la más feliz"<p>
                                <p class="text-bold text-uppercase">Guillermina debía <span class="text-danger">$153,791</span> y liquidó con tan solo <span class="text-danger">$41,573</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item text-center">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p class="text-bold">"Ahí conocí el lado opuesto de la moneda, me sentí en un mar de tranquilidad"<p>
                                <p class="text-bold text-uppercase">Rodolfo debía <span class="text-danger">$231,311</span> y podrá obtener <span class="text-danger">70% de descuento</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#testimonies" data-slide="prev">
                    <span class="fa fa-chevron-left fa-3x text-danger"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#testimonies" data-slide="next">
                    <span class="fa fa-chevron-right fa-3x text-danger"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center">
            <p class="text-bold text-danger mb-2">¡Checa las redes de Resuelve Tu Deuda!</p>

            <p class="mb-0">
                <a href="https://resuelvetudeuda.com/" title="Web">
                    <img src="{{ asset('images/landing/resuelvetudeuda/web.png') }}" width="100">
                </a>

                <a href="https://www.facebook.com/ResuelveTuDeuda" title="Facebook">
                    <img src="{{ asset('images/landing/resuelvetudeuda/fb.png') }}" width="100">
                </a>

                <a href="https://twitter.com/resuelvetudeuda" title="Twitter">
                    <img src="{{ asset('images/landing/resuelvetudeuda/tw.png') }}" width="100">
                </a>

                <a href="https://www.linkedin.com/company/resuelve-global/" title="Linkedin">
                    <img src="{{ asset('images/landing/resuelvetudeuda/in.png') }}" width="100">
                </a>
            </p>

        </div>
    </footer>

@endsection
