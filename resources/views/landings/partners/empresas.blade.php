@extends('layouts.landingb')

@push('scripts')
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="{{ mix('js/landings/partners/curadeuda.js') }}"></script>
    <style type="text/css">
      
    </style>
@endpush

@section('content')

    <div class="image-background pos-rel landing-jumbo"
        style="background: #F4F4F4;height:auto;">
        <div class="container h-100" style="padding: 8vh 0 0 0;">
            <div class="row m-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical">
                        <h1>Logra un <span class="text-danger">ambiente
                            de bienestar </span>en
                            tu empresa
                        <img src="{{ asset('images/landing/empresas/lineas.png') }}" alt="Empresas" width="40%"></h1>
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="text-black list-deco mb-0">Mejora la retención del talento</h5><br>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="text-black list-deco mb-0">Reduce los préstamos a los colaboradores</h5><br>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="text-black list-deco mb-0">Eleva la lealtad</h5><br>
                        </div>
                        <div class="d-flex flex-row align-items-center text-center">
                            <p><img src="{{ asset('images/landing/empresas/logo.png') }}" alt="Master Plan" width="85%"></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 h-100">
                    <div class="align-vertical mb-2">
                        <div class="p-4-1 p-4 rounded-lg text-center" style="background:#252525 !important;">
                            <div class="text-center">
                                <p class="text-white text-bold text-center">Comienza a crear conciencia
<span class="text-danger">en tus colaboradores</span>
sobre las finanzas sanas<br></p>
                            </div>

                            <form method="post" id="form-landing" class="form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="Empresa"
                                        id="name" class="form-control f4"
                                        placeholder="Nombre de la empresa:">
                                </div>
                                 <div class="form-group">
                                    <select name="Tipo" id="selectTipo" class="form-control required" placeholder="¿De qué tamaño es tu empresa?" id="selectTipo">
                                        <option value="" hidden selected>¿De qué tamaño es tu empresa?</option>
                                        <option value="Hasta 10 colaboradores">Hasta 10 colaboradores</option>
                                        <option value="De 11 hasta 30 colaboradores">De 11 hasta 30 colaboradores</option>
                                        <option value="De 31 hasta 50 colaboradores">De 31 hasta 50 colaboradores</option>
                                        <option value="De 51 hasta 100 colaboradores">De 51 hasta 100 colaboradores</option>
                                        <option value="De 101 hasta 250 colaboradores">De 101 hasta 250 colaboradores</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Nombre"
                                        id="name" class="form-control f4"
                                        placeholder="Nombre:">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="Apellido"
                                        id="last" class="form-control f4"
                                        placeholder="Apellido (s):">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="Correo"
                                        id="email" class="form-control f4"
                                        placeholder="Correo electrónico:">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="Celular"
                                        id="name" class="form-control f4"
                                        placeholder="Celular:">
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="g-recaptcha" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>

                                <div class="form-group clear">
                                    <button class="btn btn-block btn-danger btn-white">Más información</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <hr class="hr25">
        </div>
    </div>
    <div class="clearfix"></div>
    <div style="
    background-image: url({{ asset('/images/landing/empresas/izq-bot.png') }}), 
    url({{ asset('/images/landing/empresas/der-bot.png') }});
    background-position: left bottom, right bottom;
    background-repeat: no-repeat, no-repeat;
    background-size: auto 100px, auto 80px;
    background-color: #F4F4F4;
    margin: 0 0 -16px 0;">
    <section class="container">

        <section>
            <br>
            <h2 class="title-underline title-underline-b title-underline-danger text-center">
            Nuestra oferta de talleres:</h2>
            <div class="row mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12" style="text-align: center;">
                    <img src="{{ asset('images/landing/empresas/1.png') }}" alt="Credito" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Finanzas Personales
para Colaboradores</span></h4>
                    <hr class="hr25"><b>Ayudará a tus colaboradores</b> a tener una relación
más sana con sus finanzas personales.
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12" style="text-align: center;">
                    <img src="{{ asset('images/landing/empresas/2.png') }}" alt="Tasas" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Finanzas<br>
Familiares</span></h4>
                    <hr class="hr25"><b>Definir metas familiares</b>
y cómo inculcar las finanzas
a los más pequeños.
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12" style="text-align: center;">
                    <img src="{{ asset('images/landing/empresas/3.png') }}" alt="Monto" width="100%">
                    <h4 class="mb-3 text-center text-bold"><span class="text-danger">Inversión para<br>
Principiantes</span></h4>
                    <hr class="hr25">Aprender los <b>básicos
de la inversión,</b> cómo
y en qué <b>invertir</b> su
dinero.
                </div>
            </div><hr class="hr25">
            <br>
            <h2 class="title-underline title-underline-b title-underline-danger text-center">
            Algunos de nuestros clientes:</h2>
            <br>
            <div class="col-12 text-center">
                <p><img src="{{ asset('images/landing/empresas/empresas.png') }}" alt="Master Plan" width="85%"></p>
                <br>
            </div>
        </section>
    </section>
    </div>
    <footer class="footer f25 box">
        <div class="container text-center text-white">
           <p class="text-verde-pastel"><span class="text-bold text-danger mb-2">La relación de tu colaborador </span>con el dinero</p>
            <!--  
            <p class="mb-0">
                <a target="blank" href="#" title="web">
                    <img src="{{ asset('images/landing/empresas/web.png') }}" width="100">
                </a>
            </p> -->

        </div>
    </footer>
    @if(Session::has('descarga'))
    <script>
        window.open('{{asset('images/landing/empresas/52.pdf')}}', '_blank');
    </script>
    @endif

@endsection
