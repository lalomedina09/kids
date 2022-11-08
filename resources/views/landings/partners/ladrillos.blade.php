@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>

    <style type="text/css">
        @media (min-width: 800px) {
     #contenedorImagen {
        background-image: url(/images/landing/ladrillos/bg.png);
       }
     }

     /*tablets*/
    /* @media (min-width: 481px) and (max-width: 1024px) {
     #contenedorImagen {
        background-image: url(/images/landing/ladrillos/bgMobile.png);
      }
    }*/

    /*celulares*/
    @media (max-width: 800px) {
    #contenedorImagen {
        background-image: url(/images/landing/ladrillos/bgMobile.png);
      }
    }
    </style>
@endpush

@section('content')

    <div id="contenedorImagen" class="image-background pos-rel landing-jumbo"
        style="height:auto;">
        <div></div>
        <div class="container h-100" style="padding: 2vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger"><br><br><br><br><br><br><br>
                        <span class="text-bold">Vuélvete inmobiliario</span><br>
                        <span class="text-white">sin ser millonario</span></h1>
                        <hr class="hr26">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/ladrillos/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Invierte en inmuebles en venta o preventa</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/ladrillos/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">100% en línea</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/ladrillos/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Sin intermediarios</h5>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/ladrillos/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Respaldo bancario (fideicomiso)</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2 text-center">
                        <p>
                            <img src="{{ asset('images/landing/ladrillos/logo.png') }}" alt="Master Plan" width="40%">
                        </p>
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <p class="text-white text-bold text-center">¡Conoce cómo<br>
                                    <span class="text-secondary"> vivir de tus rentas!</span>
                                </p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="Nombre"
                                        id="name" class="form-control"
                                        placeholder="Nombre(s)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Apellidos"
                                        id="name" class="form-control"
                                        placeholder="Apellido (s)">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="Celular"
                                        id="phone" class="form-control"
                                        placeholder="Celular ( 00 - 0000 0000 )">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-danger">ASESORÍA GRATIS</button>
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
            <h1 class="title-underline title-underline-b title-underline-danger text-center">
            <span style="font-family: Montserrat; font-weight: 500">Invierte en fracciones de inmuebles hoy</span><br>
            <span class="text-bold">¡Y vive de tus rentas!</span></h1>
            <div class="row mt-5">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/1.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Analiza</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">¡Las propiedades y proyectos
                    que tenemos para ti! Evalúa el
                    inmueble, la renta y los
                    rendimientos que generan.</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/2.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Venta o Preventa</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">¡100% en línea de forma
                    sencilla y segura!
                    Sin intermediarios y sin ningún
                    costo legal, administrativo
                    ni burocrático</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/3.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Recibe tu renta</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem"><b class="text-bold">Preventa - </b>
                    Cuándo el proyecto de
                    inversión haya sido terminado y esté en operación<br>
                    <b class="text-bold">Venta - </b>Desde el primer día</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/4.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Disfruta</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">¡Nosotros nos encargamos
                    de todo!<br>
                    Cada proyecto de inversión
                    es administrado por un
                    fideicomiso independiente</p>
                </div>
            </div>
            <hr class="hr25">
        </section>
        <section>
                <BR>
                <h1 class="title-underline text-center title-underline-b title-underline-danger mb-5">Puntos claves al invertir con nosotros</h1>
            <div class="row mt-5">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/5.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Riesgo:</span><br>
                    Muy bajo</h4>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/6.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Rendimiento:</span><br>
                    16% al 29%</h4>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/7.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Plazo:</span><br>
                    Mediano y largo plazo</h4>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <img src="{{ asset('images/landing/ladrillos/8.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Liquidez:</span><br>
                    Mensual en propiedades terminadas y rentadas</h4>
                </div>
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center">
           <p class="text-danger mb-2">¡Invertir en propiedades nunca fue tan sencillo!</p>
                <!--
            <p class="mb-0">
                <a target="blank" href="https://www.masterplandigital.com/posgrados/creditos-educativos/" title="web">
                    <img src="{{ asset('images/landing/ladrillos/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>

@endsection
