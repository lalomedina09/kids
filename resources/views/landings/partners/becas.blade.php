@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>

    <style type="text/css">

    /*mobile*/
        @media (min-width: 800px)
        {
            #contenedorImagen
            {
               background-image: url(/images/landing/mdb/beca.png);
            }
        }
        @media (max-width: 800px)
        {
            #contenedorImagen
            {
                background-image: url(/images/landing/mdb/mobile.png);
            }
        }
    /*mobile*/

    /*prueba*/
    /*fin prueba*/

        .tamarillo {
        color: #F7A120;
        font-weight: 900;
        }

        .text-secondary {
        color: #e3b142!important;
        }

        .blue{
        color: #0091D9;
        /*color: #029cdc;*/
        }

        .btn-modificado {
         background-color: #F7A120;
         color: white;
         }

         .title-underlineMod {
          position: relative;
          border-top: 3px solid;
          width: 100px;
          margin-left: auto;
          margin-right: auto;
          color: #FF6161
        }

          .title2 {
          position: relative;
          margin:4vh;
          padding: 0;
          }
    </style>
@endpush

@section('content')

    <!-- inicio de cuerpo de landing -->
        <div id="contenedorImagen" class="image-background pos-rel landing-jumbo landing-jumbo2"
        style="height:auto;">
        <div></div>
        <div class="container h-100" style="padding: 3vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-7 col-lg-7 col-md-7 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger"><br><br><br><br><br>
                        <span class="text-bold"> Regala a tus hijos </span><br>
                        <span class="text-white"> una educación </span><br>
                        <span class="text-bold"> de calidad </span><br></h1>
                        <hr class="hr26">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Ahorra para la universidad o preparatoria de tus hijos, y obtén rendimientos </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Aportaciones a mediano plazo </h4>
                        </div>

                         <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Alianzas con universidades nacionales y extranjeras </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/nube/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Más de 56,000 padres de familia suscriptores </h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5 col-12 h-100">
                    <div class="align-vertical mb-1 text-center">
                        <p>
                            <img src="{{ asset('images/landing/mdb/mdblogo2.png') }}" alt="Master Plan" width="85%">
                        </p>
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                 <p class="text-white text-bold text-center"> Prepara <span class="text-secondary"> el camino </span> de tus hijos </p>
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
                                    <input type="text" name="Celular"
                                        id="name" class="form-control"
                                        placeholder="Celular">
                                </div>

                                 <div class="form-group">
                                    <select style="font-size: 13px" name="ahorroPrepa" id="ahorroPrepa" class="form-control required" placeholder="¿Quieres ahorrar para la prepa y/o universidad de tus hijos?" id="selectTipo">
                                        <option value="" hidden selected>¿Quieres ahorrar para la prepa y/o universidad de tus hijos?</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="edadHijos"
+                                        id="name" class="form-control"
+                                        placeholder="¿Qué edad tienen tus hijos?">
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-modificado"> MENTORÍA GRATIS </button>
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
            <span style="font-family: Montserrat; font-weight: 500"> Garantiza la educación de tus hijos <br>
con un respaldo económico </span>
            <h2 class="text-center blue ">
            <span style="font-family: Montserrat; font-weight: 500"> (Fideicomiso educativo) </span></h2>
            <hr class="title-underlineMod title-underlineMod-danger">
            <div class="row mt-5">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo"> 1 </div>
                    <img src="{{ asset('images/landing/mdb/ahorro.png') }}" alt="Credito" width="90%"><br>
                    <h4 class="mb-4 text-bold text-center"><span class="text-danger"> Ahorro </span></h4>
                    <hr class="hr25">
                    <p class="text-center font-weight-lighter" style="font-size: 1rem">Enfocado específicamente <br> en la educación (prepa <br> y universidad). </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">2</div>
                    <img src="{{ asset('images/landing/mdb/pagado.png') }}" alt="Credito" width="90%"><br>
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger"> Aportaciones a mediano plazo </span></h4>
                    <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Único plan de ahorro <br> educativo con aportaciones <br> de 4 y 5 años. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">3</div>
                    <img src="{{ asset('images/landing/mdb/respaldo.png') }}" alt="Credito" width="90%"><br>
                    <h4 class="mb-4 text-bold text-center"><span class="text-danger"> Respaldo </h4>
                    <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem">  Fideicomiso especializado <br> para la educación operado <br> por Santander (2003285).</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="circulo">4</div>
                    <img src="{{ asset('images/landing/mdb/impuesto.png') }}" alt="Credito" width="90%"><br>
                    <h4 class="mb-4 text-bold text-center"><span class="text-danger"> Beneficios fiscales </span></h4>
                    <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Los rendimientos obtenidos <br> están exentos del impuesto <br>  sobre la renta (ISR). </p>
                </div>
            </div>
            <br>
            <hr class="hr25">
            <br>
        </section>

<section>
                <!--cambie las clases de los titulos y el hr -->
                <h1 class="text-center title2 mb-3">¿Cómo funciona Mexicana de Becas? </h1>
                <hr class="title-underlineMod title-underlineMod-danger">
            <div class="row mt-5">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12 col-center" >
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Aportación </span></h4>
                    <img src="{{ asset('images/landing/mdb/mdb1.png') }}" alt="Credito" width="100%" >
                    <br>
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> El primer paso es decidir si <br> ahorrarás para la prepa o <br> universidad de tus  hijos. <br> Luego defines cada cuándo <br> harás la aportación. Puede <br> ser: mensual, trimestral, <br>semestral, anual o <br> pago único. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12 col-center">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger">Rendimiento </span></h4>
                    <img src="{{ asset('images/landing/mdb/mdb2.png') }}" alt="Credito" width="100%"><br>
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Posterior al primer año, <br> tu ahorro comienza a <br> generar rendimientos <br> hasta que tu hijo concluya <br> sus estudios. </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12 col-center">
                    <h4 class="mb-3 text-bold text-center"><span class="text-danger"> Entrega de inversión </span></h4>
                    <img src="{{ asset('images/landing/mdb/mdb3.png') }}" alt="Credito" width="100%">
                    <br>
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Se realiza de forma anual, <br> previo al inicio del ciclo <br> escolar. </p>
                    <p class=" text-center font-weight-lighter" style="font-size: 1.2rem"> <span class="tamarillo"> 3 AÑOS </span> - PREPA <br> <span class="tamarillo"> 5 AÑOS </span> - UNIVERSIDAD </p>

                </div>
            </div>
            <br>
            <hr class="hr25">
            <br>
        </section>

        <section>
                <!--cambie las clases de los titulos y el hr -->
                <h1 class="text-center title2 mb-2"> El futuro educativo de tus hijos <br> está en tus manos </h1>
                <h2 class="text-center blue ">
            <span style="font-family: Montserrat; font-weight: 500"> #ConstruyeSuCamino </span></h2>

            <div class="row mt-4">
                <div class="col-xl-5 col-lg-5 col-md-5 col-12 col-center">
                    <img src="{{ asset('images/landing/mdb/Landingmdb.png') }}" alt="Credito" width="100%">
                </div>
            </div>
        </section>
    </section>

    </section>

    <footer class="footer box">
        <div class="container text-center">
           <p class="text-danger mb-2">¡La inversión que construye el futuro educativo de tus hijos! </p>
                <!--
            <p class="mb-0">
                <a target="blank" href="https://www.masterplandigital.com/posgrados/creditos-educativos/" title="web">
                    <img src="{{ asset('images/landing/ladrillos/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>
       <!-- fin de cuerpo de landing -->

@endsection
