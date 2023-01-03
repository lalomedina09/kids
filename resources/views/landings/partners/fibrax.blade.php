@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/fibrax/bg.jpg);min-height:92vh;height:auto;">
        <div class="overlay"></div>
        <div class="container h-100" style="padding: 10vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-white"><span class="text-danger"><br>Alcanza la libertad</span><br>
financiera invirtiendo<br>
<span class="text-danger">en bienes raíces</span></h1>
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/fibrax/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Rendimientos proyectados</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/fibrax/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Bajo riesgo</h5>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/fibrax/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Diversificación</h5>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('images/landing/fibrax/chk2.png') }}" width="40" class="mr-2">
                            <h5 class="text-white mb-0">Rentabilidad de Media-Alta</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <img src="{{ asset('images/landing/fibrax/logo.png') }}" alt="Master Plan" width="70%">
                                <p class="text-white text-bold">Partner oficial</p>
                                <p class="text-white text-bold text-center">¡Invierte en <span class="text-danger"> Activos </span>!</p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="Nombre"
                                        id="name" class="form-control"
                                        placeholder="Nombre">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="Apellido"
                                        id="name" class="form-control"
                                        placeholder="Apellido">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="Celular"
                                        id="phone" class="form-control"
                                        placeholder="Celular">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="Correo"
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
                                    <button class="btn btn-block btn-danger">Contactar a un couch</button>
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
                    <img src="{{ asset('images/landing/fibrax/a.png') }}" alt="" width="80%" class="mb-3">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <h2 class="text-bold mb-4">Invertir en bienes raíces<br>
 <span class="text-danger">es la mejor opción</span></h2>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <h4 class="font-weight-light mb-0">Te acercamos las oportunidades de
inversión en bienes raíces exponenciales,
las mejores opciones con los más altos
rendimientos.</h4>
                    </div>

                </div>
            </div>

            <hr>
        </section>

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">Beneficios de invertir con nosotros</h1>

            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/fibrax/1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Zonas con proyecciones de
Alta Demanda </span> que aseguran
rendimientos en tu inversión</h4>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/fibrax/2.png') }}" alt="Tasas" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Urbanización a mediano plazo,
</span> para que no tengas que esperar
demasiado para ver el fruto
de tu inversión</h4>
                </div>
                <div class="col-2"></div>
                <div class="clearfix"></div>
                <div class="col-2"></div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/fibrax/3.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Macroproyectos
</span> que determinan
la plusvalía</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/fibrax/4.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Proyectos con el respaldo
jurídico </span> que aseguran
tu inversión</h4>
                </div>
            </div>

            <hr>
        </section>


        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger mb-5">Alcanza tus metas financieras
<br><span class="text-danger">de la manera correcta: Invirtiendo</span></h1>

                <img src="{{ asset('images/landing/fibrax/f.png') }}" alt="" width="520">
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center">
           <!--  <p class="text-bold text-danger mb-2">¡Checa las redes de Fibrax Life!</p>

            <p class="mb-0">
                <a target="blank" href="#" title="web">
                    <img src="{{ asset('images/landing/fibrax/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>

@endsection
