@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/basico/bg.jpg);height:auto;">
        <div class="container h-100" style="padding: 2vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-white"><br>¿Querés que tus planes
se hagan realidad?</h1>
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="text-black mb-0">Te regalamos nuestro descargable<br><br>
<b>¡Crea tu presupuesto básico!</b></h5>
                        </div>
                        <div class="d-flex flex-row align-items-center text-center">
                            <p><img src="{{ asset('images/landing/basico/logo.png') }}" alt="Master Plan" width="70%"></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4-1 p-4 rounded-lg text-center" style="background-color:rgba(0,0,0,0.4);">
                            <div class="text-center">
                                <p class="text-white text-bold text-center">Regístrate y recibe<br>
                                <span class="text-secondary"> el formato en tu correo</span></p>
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
                                        id="last" class="form-control"
                                        placeholder="Apellido(s)">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="Correo"
                                        id="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>

                                <div class="form-group">
                                    <select name="Estado" id="mce-STATE" class="form-control required" placeholder="Estado">
                                        <option value="" hidden selected>Estado</option>
                                        <option value="No soy de Colombia">No soy de Colombia</option>
                                        <option value="Antioquía">Antioquía</option>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Atlántico">Atlántico</option>
                                        <option value="Bolívar">Bolívar</option>
                                        <option value="Boyacá">Boyacá</option>
                                        <option value="Caldas">Caldas</option>
                                        <option value="Caquetá">Caquetá</option>
                                        <option value="Casanare">Casanare</option>
                                        <option value="Cauca">Cauca</option>
                                    </select>
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-danger text-normal">¡Descargar Formato!</button>
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
            <span class="text-danger">¡Mejora tu relación con el dinero!</span><br>
Descarga el formato de presupuesto que te ayudará a:</h1>
            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/basico/1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Poner en orden tus
finanzas personales
</span> 
de forma sencilla
y divertida</h4>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/basico/2.png') }}" alt="Tasas" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Aplicar la regla del 50-30-20 </span> 
                    sugerida por los expertos
financieros</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/basico/3.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Mejora tus hábitos
financieros con una guía</span> 
visual para cuándo
la necesites</h4>
                </div>
            </div>
        </section>
    </section>

    <footer class="footer box">
        <div class="container text-center text-white">
            <div class="text-center mx-auto"><a href="#" 
                            data-toggle="modal" data-target="#register-modal">
                <img src="{{ asset('images/logo_light.svg') }}"
                    class="my-1"
                    height="35px" alt="Querido Dinero">
            </div>
           <p><span class="text-bold text-danger mb-2">Tu relación </span>con el dinero</p>
            <!--  
            <p class="mb-0">
                <a target="blank" href="#" title="web">
                    <img src="{{ asset('images/landing/basico/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>
    @if(Session::has('descarga'))
    <script>
        window.open('{{asset('images/landing/basico/basico.pdf')}}', '_blank');
    </script>
    @endif

@endsection
