@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>

    <style type="text/css">  
        @media (min-width: 576px) 
        {
            #contenedorImagen 
            {
               background-image: url(images/landing/garbi/Garvi06.png);
            }
        }
        @media (max-width: 576px) 
        {
            #contenedorImagen 
            {
                background-image: url(images/landing/garbi/Garvi06.png);
            }
        }
    </style>
@endpush

@section('content')

     <!-- inicio de cuerpo de landing -->
        <div id="contenedorImagen" class="image-background pos-rel landing-jumbo landing-jumbo2"
        style="height:auto;">

        <!--AQUI HICE EL CAMBIO MAYRA  -->
        <br>
        <div class="container">
            <p class="col-xl-7 col-lg-7 col-md-7 col-12 col-center ">
             <img src="{{ asset('images/landing/garbi/logoUpdate.png') }}" width="100%" >
            </p>
        </div>
        <!--MAYRA  --> 

        <div class="container h-100" style="padding: 3vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-7 col-lg-7 col-md-7 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-danger"><br><br><br><br><br>
                        <span class="text-bold"> El escenario perfecto </span><br>
                        <span class="text-white"> para tu vida </span><br></h1>
                        <hr class="hr26">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/garbi/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Compra en Preventa y gana Plusvalía </h4>
                        </div>
                       
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/garbi/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3"> Vistas Esenikas hacia el Bosque <br> de La Primavera </h4>
                        </div>

                         <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/garbi/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3">A unos pasos de Punto Sur </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/garbi/chk2.png') }}" width="40" class="mr-0">
                            <h4 class="teb text-white mb-3">Desarrollado por Garvi </h4>
                        </div>

                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5 col-12 h-100">
                    <div class="align-vertical mb-1 text-center">
                       
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                 <p class="text-white text-bold text-center"> ¿List@ para estrenar <span class="text-secondary"> tu nuevo depa? </span></p>
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
  
                                <div class="form-group mx-auto">
                                    <!-- <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif -->
                                </div>

                                <div class="form-group clear">
                                    <button style="background-color: #5dc6ca; color: #f4fefd;" class="btn btn-block"> MÁS INFORMACIÓN </button>
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
            <span style="font-family: Montserrat; font-weight: 500"> Esenika sur es tu mejor opción <br> para vivir en Guadalajara</span>
            <hr class="title-underline title-underline-danger">
            <div class="row mt-4">
                <div class="col-xl-9 col-lg-9 col-md-9 col-12 col-center"> 
                    <img src="{{ asset('images/landing/garbi/garvi08.png') }}" alt="Esenika" width="100%" ><br> 
                </div>
            </div>
            <hr class="hr25">
            <br>
        </section>

<section>        
                <!--cambie las clases de los titulos y el hr -->
                <h1 class="text-center title2 mb-2">Espacios espectaculares <br> para disfrutar tu vida</h1>
                <hr class="title2 title-underline">
            <div class="row mt-5 col-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-center" >
                    <img src="{{ asset('images/landing/garbi/garvi_mesa1.png') }}"  width="100%" > 
                     <h4 class="mb-3 text-bold text-center"><span class="text-danger">Cowork Roof Top </span></h4>
                     <h5 class="mb-3 text-bold text-center"> Haz Home Office con estilo </span></h5>
                     <div class="d-flex flex-row align-items-center "> 
                     <img src="{{ asset('images/landing/garbi/garvi10.png') }}" width="50" >
                     <h6 class="mb-1 text-center" style="color:#459fdc;" > Sobre torre 1 </h6>
                     </div>
                     <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Mobiliario ideal para hacer <br> Home Office, con zona para <br> liberar el estrés y estación <br> de café. </p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-center" >
                    <img src="{{ asset('images/landing/garbi/garvi_mesa2.png') }}"  width="100%" > 
                     <h4 class="mb-3 text-bold text-center"><span class="text-danger">Lounge Roof Top </span></h4>
                     <h5 class="mb-3 text-bold text-center"> El espacio para divertirte</span></h5>
                     <div class="d-flex flex-row align-items-center "> 
                     <img src="{{ asset('images/landing/garbi/garvi10.png') }}" width="50" >
                     <h6 class="mb-1 text-bold text-center" style="color:#459fdc;"> Sobre torre 2 </h6>
                     </div>
                     <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Juegos de mesa, una barra social para tus bebidas favoritas y además un área para proyectar películas al aire libre. </p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-center" >
                    <img src="{{ asset('images/landing/garbi/garvi_mesa3.png') }}"  width="100%" > 
                     <h4 class="mb-3 text-bold text-center"><span class="text-danger"> Grill Roof Top </span></h4>
                     <h5 class="mb-3 text-bold text-center"> Convive con tu familia y amigos</span></h5>
                     <div class="d-flex flex-row align-items-center "> 
                     <img src="{{ asset('images/landing/garbi/garvi10.png') }}" width="50" >
                     <h6 class="mb-1 text-bold text-center" style="color:#459fdc;"> Sobre la Torre 3 </h6>
                     </div>
                     <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Mobiliario ideal para hacer <br> Home Office, con zona para <br> liberar el estrés y estación <br> de café. </p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-center" >
                    <img src="{{ asset('images/landing/garbi/garvi_mesa4.png') }}"  width="100%" > 
                     <h4 class="mb-3 text-bold text-center"><span class="text-danger">Fit Pool Terrace</span></h4>
                     <h5 class="mb-3 text-bold text-center"> Tu gimnasio cerca de ti </span></h5>
                     <div class="d-flex flex-row align-items-center "> 
                     <img src="{{ asset('images/landing/garbi/garvi10.png') }}" width="50" >
                     <h6 class="mb-1 text-bold text-center" style="color:#459fdc;"> Nivel 1 de la torre 1 </h6>
                     </div>
                     <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Cuenta con accesorios para que te ejercites y una alberca donde podrás relajarte después de hacer ejercicio.</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-center" >
                    <img src="{{ asset('images/landing/garbi/garvi_mesa5.png') }}"  width="100%" > 
                     <h4 class="mb-3 text-bold text-center"><span class="text-danger">Chill Pool Terrace </span></h4>
                     <h5 class="mb-3 text-bold text-center"> Relájate los fines de semana</span></h5>
                     <div class="d-flex flex-row align-items-center "> 
                     <img src="{{ asset('images/landing/garbi/garvi10.png') }}" width="50" >
                     <h6 class="mb-1 text-bold text-center" style="color:#459fdc;"> Nivel 1 de la torre 3 </h6>
                     </div>
                     <hr class="hr25">
                    <p class=" text-center font-weight-lighter" style="font-size: 1rem"> Área de hamacas para que te recuperes de la semana laboral relajándote al máximo. </p>
                </div>
            </div>
            <br>
            <hr class="hr25">
            <br>
        </section>

        <section>        
                <!--cambie las clases de los titulos y el hr -->
                <h1 class="text-center title2 mb-2"> Departamentos desde 2.62 millones </h1>
                <h3 class="text-center">
            <span style="font-family: Montserrat; font-weight: 600"> <span class="text-danger"> Enganche desde 5% más 10% financiado a 18 meses sin intereses </span>  <br>  Invierte en Preventa y gana Plusvalía </span></h3>
            <hr class="title2 title-underline">

            <div class="container h-100 d-flex " style="padding: 0vh 0 0 0;">
                <div class="row m-0 h-0 mr-0"> 
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                    <img src="{{ asset('images/landing/garbi/garvi5.png') }}"  width="100%">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 ">
                <div class="d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0"> 
                     <p class="font-weight-lighter" style="font-size: 1,5rem"> Modelos de 62 m², 74 m²,81 m² y 93 m² </p>
                </div>
                  <div class=" d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0"> 
                     <p class="font-weight-lighter" style="font-size: 1,5rem">2 habitaciones </p>
                </div>
                  <div class=" d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0">
                     <p class="font-weight-lighter" style="font-size: 1,5rem"> 1 o 2 baños completos </p>
                </div>
                  <div class=" d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0">
                     <p class="font-weight-lighter" style="font-size: 1,5rem"> 2 cajones de estacionamiento </p>
                </div>
                  <div class="  d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0">
                     <p class="font-weight-lighter" style="font-size: 1,5rem"> Tus ahorros estarán en una cuenta a tu nombre </p>
                </div>
                <div class="  d-flex flex-row align-items-center">
                     <img src="{{ asset('images/landing/garbi/chk.png') }}" width="40" class="mr-0">
                     <p class="font-weight-lighter" style="font-size: 1,5rem"> Invierte con descuentos especiales por pago de contado</p>
                </div>
             </div>
            </div>
        </section>
    </section>

    </section>

    <footer class="footer box">
        <div class="container text-center">
           <p class="text-danger mb-2">Más de 10 años construyendo sueños </p>
                <!--  
            <p class="mb-0">
                <a target="blank" href="https://www.masterplandigital.com/posgrados/creditos-educativos/" title="web">
                    <img src="{{ asset('images/landing/ladrillos/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>

@endsection
