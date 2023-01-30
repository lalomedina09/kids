@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>

    <style type="text/css">
        @media (min-width: 800px) {
     #contenedorImagen {
        background-image: url(/images/landing/tiendanube/bgtiendan.png);
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
        background-image: url(/images/landing/tiendanube/bgm9.jpg);
      }
    }

    .blue{
      color: #029cdc;
     }
    </style>
@endpush

@section('content')

    <div id="contenedorImagen" class="image-background pos-rel landing-jumbo landing-jumbo2"
        style="height:auto;">
        <div></div>
        <div class="container h-100" style="padding: 2vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger"><br><br><br><br><br><br><br>
                        <span class="text-bold"> Potencia tu negocio </span><br>
                        <span class="text-white"> con la plataforma líder </span><br>
                        <span class="text-bold"> en Latinoamérica </span><br></h1>
                        <hr class="hr26">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-2">
                            <h4 class="teb text-white mb-0"> Gestiona tus productos y ventas </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-2">
                            <h4 class="teb text-white mb-0"> Integra medios de pago y envío </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-2">
                            <h4 class="teb text-white mb-0"> Conecta otros canales de venta </h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2 text-center">
                        <p>
                            <img src="{{ asset('images/landing/tiendanube/tiendanubelogo.png') }}" alt="Master Plan" width="50%">
                        </p>
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                 <p class="text-white text-bold text-center"> Para negocios de <br>
    <span class="text-secondary"> todos los tamaños </span></p>
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
                                    <input type="email" name="email"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>

                                <div class="form-group">
                                    <select name="textnegocio" id="textnegocio" class="form-control required" placeholder="¿De qué tamaño es tu empresa?" id="selectTipo">
                                        <option value="" hidden selected>¿Tienes un negocio?</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <select name="textlinea" id="textlinea" class="form-control required" placeholder="¿De qué tamaño es tu empresa?" id="selectTipo">
                                        <option value="" hidden selected>¿Tienes una tienda en línea?</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>


                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-nube"> Crea tu tienda y obtén <br> 50% de descuento  </button>
                                </div>
                                 <div class="text-center">
                                 <p class="text-white text-center textsize"> <span class="blue"> * </span> Aplica para tiendas nuevas, primeros 30 días <br>  gratis y 50% de descuento en el primero pago.</p>
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
            <h1 class="text-center title ">
            <span style="font-family: Montserrat; font-weight: 500"> Crea tu tienda en línea en solo 4 pasos </span>
            <hr class="title-underline title-underline-danger">
            <br>
            <div class="row mt-5">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo"> 1 </div>
                    <img src="{{ asset('images/landing/tiendanube/nubemesa1.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Crea tu tienda</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">Regístrate con tu email,<br> escribe el nombre de <br> tu marca y crea una <br> contraseña. Elige un diseño <br> y personalízalo a la medida <br> de tu negocio. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">2</div>
                    <img src="{{ asset('images/landing/tiendanube/nubemesa2.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Gestiona tu stock</span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">Agrega, edita y borra <br> productos cuando quieras.<br> Organiza tu stock por <br> categorías, define precios,<br> variantes y promociones <br> desde cualquier dispositivo. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">3</div>
                    <img src="{{ asset('images/landing/tiendanube/nubemesa3.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Configura tus <br> pagos y envíos </span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem"> Acepta todas las formas de <br> pago y ofrece opciones de <br> financiamiento. Integra <br> medios de envío locales y <br> comparte con tus clientes <br> la página de rastreo. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">4</div>
                    <img src="{{ asset('images/landing/tiendanube/nubemesa4.png') }}" alt="Credito" width="100%">
                    <hr class="hr25">
                    <h4 class="mb-3 text-bold"><span class="text-danger">Centraliza <br> tus ventas </span></h4>
                    <p class="font-weight-lighter" style="font-size: 1rem">Conecta tu catálogo con <br> redes sociales, marketplaces, <br> WhatsApp, Google Shopping <br> y tu tienda física. </p>
                </div>
            </div>
            <hr class="hr25">
        </section>
        <section>
                <!--cambie las clases de los titulos y el hr -->
                <h1 class="text-center title2 mb-3"> Llego la hora de vender online </h1>
                <hr class="title2 title-underline">
            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/tiendanube/tiendamasa1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">+70,000 marcas </span><br>
                    usan Tiendanube </h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/tiendanube/tiendamasa2.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">A nivel Latinoaméricana, </span><br>
                    se hace una venta por segundo en Tiendanube </h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/tiendanube/tiendamasa3.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger"> Tiendas 100% optimizadas </span><br>
                    para dispositivos móviles </h4>
                </div>
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center">
           <p class="text-danger mb-2">Todo lo que tu negocio necesita para vender </p>
                <!--
            <p class="mb-0">
                <a target="blank" href="https://www.masterplandigital.com/posgrados/creditos-educativos/" title="web">
                    <img src="{{ asset('images/landing/ladrillos/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>

@endsection
