@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/curadeuda/bg.jpg);">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h5 class="text-white mb-2">¿Tus deudas son impagables?</h5>

                        <h1 class="text-danger">Liquídalas con descuentos desde <span class="text-white">40% hasta 90%</span> sobre el monto total</h1>

                        <h5 class="text-white mb-4">Sin Préstamos, Ni Créditos</h5>

                        <h5 class="text-white">Negociamos tus deudas con:</h5>
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Bancos</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Tarjetas de crédito</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Tiendas departamentales</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <img src="{{ asset('images/landing/curadeuda/logo.png') }}" alt="Curadeuda" width="70%">
                                <p class="text-white text-bold">Partner oficial</p>
                                <p class="text-white text-bold text-center">Comienza ahora y paga tus deudas con un <span class="text-danger">Plan Personalizado</span></p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name"
                                        id="name" class="form-control"
                                        placeholder="Nombre">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="lastname"
                                        id="lastname" class="form-control"
                                        placeholder="Apellido">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone"
                                        id="phone" class="form-control"
                                        placeholder="Celular">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>

                                <div class="form-group">
                                    <select name="range"
                                        id="range" class="form-control">
                                        <option value="">Rango de Deuda</option>
                                        <option value=" más de $1,000,000"> más de $1,000,000</option>
                                        <option value=" $500,000 a $1,000,000"> $500,000 a $1,000,000</option>
                                        <option value=" $250,000 a $500,000"> $250,000 a $500,000</option>
                                        <option value="$100,000 a $250,000">$100,000 a $250,000</option>
                                        <option value="Menos de $100,000">Menos de $100,000</option>
                                    </select>
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
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">En solo 3 pasos ¡Liquida tu deuda!</h1>

            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/curadeuda/1.png') }}" alt="Asesoría Financiera" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Asesoría financiera</h4>
                    <p class="font-weight-lighter">Diagnosticamos tu caso, brindándote asesoría legal y financiera totalmente gratis.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/curadeuda/2.png') }}" alt="Estrategia de pagos" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Estrategia de pagos</h4>
                    <p class="font-weight-lighter">Creamos un plan ajustado a tus necesidades basado en tu capacidad de ahorro, negociando el mejor descuento posible.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/curadeuda/3.png') }}" alt="Liquidación de deuda" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Liquidación de deuda</h4>
                    <p class="font-weight-lighter">Pagamos la deuda con lo ahorrado durante el programa y te entregamos tu certificado de liquidación de adeudos.</p>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Comienza hoy y paga tus deudas</h1>
            </div>

            <div class="row mb-4">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/landing/curadeuda/a.png') }}" alt="" width="80%" class="mb-3">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <h5 class="text-center text-bold text-danger mb-4">Sin Préstamos, ni Créditos</h5>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                        <h5 class="font-weight-light mb-0">Tendrás un Couch Personal durante todo el programa</h5>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                        <h5 class="font-weight-light mb-0">Negociamos a tu favor con las Instituciones Financieras</h5>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                        <h5 class="font-weight-light mb-0">Tus ahorros estarán en una cuenta a tu nombre</h5>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <img src="{{ asset('images/landing/curadeuda/chk.png') }}" width="40" class="mr-2">
                        <h5 class="font-weight-light mb-0">Despreocúpate de las llamadas de cobranza</h5>
                    </div>

                    <p class="text-center text-bold">Nosotros nos encargaremos de todo.</p>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Testimonios de nuestros clientes</h1>

                <img src="{{ asset('images/landing/curadeuda/q.gif') }}" alt="" width="150">
            </div>

            <div id="testimonies" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#testimonies" data-slide-to="0" class="bg-danger active"></li>
                    <li data-target="#testimonies" data-slide-to="1" class="bg-danger"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p>Mi plan era para año y medio, lo terminé pagando en año dos meses” reitera el señor Olguín; así mismo menciona que es excelente el descuento obtenido en sus deudas el cual fue del 66%.</p>
                                <p class="text-danger text-uppercase">Gerardo A Ogluin.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item text-center">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p>Tuve acercamiento con los bancos para liquidar las deudas; pero no illegué a ningún arreglo, por lo que contrate Cura Deuda y el número de llamadas si disminuyeron de manera considerable.</p>
                                <p class="text-danger text-uppercase">Mario Varela P.</p>
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
            <p class="text-bold text-danger mb-2">¡Checa las redes de Curadeuda!</p>

            <p class="mb-0">
                <a href="https://registro.curadeuda.com/queridodinero/clkn/https/twitter.com/curadeuda?qb_fuente=110&qb_campaign=77&source=ArticuloBlog&campaign=Leads&network=%7Bnetwork%7D&device=%7Bdevice%7D&placement=%7Bplacement%7D" title="Twitter">
                    <img src="{{ asset('images/landing/curadeuda/tw.png') }}" width="100">
                </a>

                <a href="https://registro.curadeuda.com/queridodinero/clkn/https/www.facebook.com/CuraDeuda/?qb_fuente=110&qb_campaign=77&source=ArticuloBlog&campaign=Leads&network=%7Bnetwork%7D&device=%7Bdevice%7D&placement=%7Bplacement%7D" title="Facebook">
                    <img src="{{ asset('images/landing/curadeuda/fb.png') }}" width="100">
                </a>

                <a href="https://registro.curadeuda.com/queridodinero/clkn/https/www.linkedin.com/company/cura-deuda/?qb_fuente=110&qb_campaign=77&source=ArticuloBlog&campaign=Leads&network=%7Bnetwork%7D&device=%7Bdevice%7D&placement=%7Bplacement%7D" title="Linkedin">
                    <img src="{{ asset('images/landing/curadeuda/in.png') }}" width="100">
                </a>
            </p>

        </div>
    </footer>

@endsection
