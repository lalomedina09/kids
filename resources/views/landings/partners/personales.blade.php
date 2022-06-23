@extends('layouts.landing')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background-image: url(/images/landing/personal/bg.jpg);height:auto;">
        <div class="container h-100" style="padding: 2vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1 class="text-white"><span class="text-danger"><br>Tus finanzas personales
nunca fueron tan fáciles</span></h1>
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="text-black mb-0">En Querido Dinero te ayudamos
a ahorrar.
<b>Regístrate y descarga</b></h5>
                        </div>
                        <div class="d-flex flex-row align-items-center text-center">
                            <p><img src="{{ asset('images/landing/personal/logo.png') }}" alt="Master Plan" width="85%"></p>
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
                                        <option value="">Estado</option>
                                        <option value="No soy de México">No soy de México</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Durango">Durango</option>
                                        <option value="México">México</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
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
                        <p class="text-bold text-center">
                            ¡Ahorra 13 mil pesos en 52 semanas!<br><p>
                         <p class="text-bold text-left">   Te regalamos nuestro descargable<br>
                            ¡Reto de las 52 semanas!
                            </p>
                            <!-- <img src="{{ asset('images/landing/personal/4.png') }}" alt="Credito" width="100"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="container">

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">
            ¿Por qué me ayuda El Reto de las 52 Semanas
<br><b>en mis Finanzas Personales?</b></h1>
            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/personal/1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Empiezo a ahorrar</span> 
                    de manera sencilla</h4>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/personal/2.png') }}" alt="Tasas" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Ahorro para mis metas </span> 
                    o hacer un fondo de emergencia</h4>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/personal/3.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Me da seguridad y paz </span> mental tener dinero
                        en caso de emergencias</h4>
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
                    <img src="{{ asset('images/landing/personal/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>
    @if(Session::has('descarga'))
    <script>
        window.open('{{asset('images/landing/personal/52.pdf')}}', '_blank');
    </script>
    @endif

@endsection
