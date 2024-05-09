@extends('layouts.landing-v2-white')

@if (app()->environment() === 'production')
    @push('scripts-inline')
        @include('preQdplay.components.fb-convercion')
    @endpush
@endif

{{-- Estilos css3---}}
@push('styles')
    @include('landings.components.retiro.style')
@endpush

@push('styles-inline')
<style>
    .form-control {
        background: #ffffff !important;
    }
</style>
@endpush

{{-- Contenido --}}
@section('content')

<div class="container pt-0 pt-lg-4">
    <!--<section class="text-center pb-3">
        <img src="{{ asset('etapa1/landings/v3/Asset 18-min.png') }}" alt="Logo QD Play" width="100">
    </section>-->
    <section>
        <div class="row mb-4">
            <div class="col-md-6">
                <span class="font-akshar" style="font-size:30px;">CURSO DE</span><br>

                <h1 class="font-besley-medium">
                    Planeación del retiro <br>                    
                </h1>
                <h1 class="font-besley-medium" style="margin-top: 20px; margin-bottom: 20px;">
                    <span style="background-color: #f7dc4c;">para tu equipo</span>
                </h1>
                <p class="font-akshar" style="font-size: 26px;">
                    Apoya a tus empleados en su desarrollo personal y profesional
                </p>

                <form action="{{ route('register.qdplay.store') }}" method="POST" class=" movil-form-center">

                    @csrf

                    <div class="row pl-2 pt-2 pb-3 font-akshar">
                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <input type="text" name="name" placeholder="Nombre (s)" class="form-control form-control-lg"
                                required="required">
                            @if ($errors->has('name'))
                            <span class="small text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <input type="text" name="last_name" placeholder="Apellido (s)" class="form-control form-control-lg"
                                required="required">
                            @if ($errors->has('last_name'))
                            <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <input type="email" name="mail_corporate" placeholder="E-mail de trabajo"
                                class="form-control form-control-lg" required="required">
                            @if ($errors->has('mail_corporate'))
                            <span class="small text-danger">{{ $errors->first('mail_corporate') }}</span>
                            @endif
                        </div>

                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <input type="tel" name="movil" placeholder="Celular" class="form-control form-control-lg"
                                required="required">
                            @if ($errors->has('movil'))
                            <span class="small text-danger">{{ $errors->first('movil') }}</span>
                            @endif
                        </div>

                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <input type="text" name="company" placeholder="Nombre de la empresa" class="form-control form-control-lg"
                                required="required">
                            @if ($errors->has('company'))
                            <span class="small text-danger">{{ $errors->first('company') }}</span>
                            @endif
                        </div>

                        <div class="col-12 padding-custom-regis-qdp mb-2">
                            <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('money.recaptcha.key') }}"></div>

                            @if ($errors->has('g-recaptcha-response'))
                            <span class="small text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>

                        <div class="col-12 text-left padding-custom-regis-qdp">
                            <button type="submit" class="btn btn-dark text-uppercase font-weight-bold p-3 p-lg-3 mb-2">
                                SOLICITAR COTIZACIÓN
                            </button>
                            <!--<input type="submit" value="Enviar" class="tag border-0 p-2 p-lg-3 bg-green-blue text-white text-uppercase">-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/landing/retiro/gifs/GIF-personas-circulo-girando-landing.png')}}" width="100%" alt="Ilustracion">
            </div>
        </div>
        <br>
    </section>

    <section>        
        <div class="row mt-4 mb-4 align-items-center">
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/Rectanglefiat.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/Rectanglebanorte.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/vector.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/homedepot.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/amis.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/landing/retiro/clients/hir casa.png')}}" alt="Client" class="" style="display: block; margin:auto;">
            </div>
        </div>
    </section>

    <section>
        <br>
        <div class="row mt-4">
            <div class="col-md-6" style="position: relative;">
                <p class="font-akshar" style="font-size:26px;">
                    Prepara a tu equipo para el retiro, este curso ayudará a tus colaboradores a conocer las diferentes opciones
                    para
                    invertir en su futuro, como son: <span style="font-weight: 500;">Afore, plan personal para el retiro, seguro
                        para el retiro, así como los beneficios
                        fiscales que ofrecen.</span>
                    <br><br>
                    Explicamos los conceptos financieros con un lenguaje sencillo y fácil de entender. <br>
                    El contenido de los cursos es <span style="font-weight: 500;">único y entretenido</span>
                    con nuestras ilustraciones que nos caracterizan.
                </p>
                <span class="font-akshar"
                    style="background-color: #f7dc4c; padding: 5px; position: absolute; bottom: 0; left: 0; padding-left: 10px; padding-right: 10px; font-size:26px;">
                    <b>Formato</b>: Presencial o virtual
                </span>
            </div>
            <div class="col-md-6" style="position: relative;">
                <img src="{{ asset('images/landing/retiro/photos/foto_1.png')}}" alt="Photo" class="img-responsive">
                <div class="zoom-circle"></div>
            </div>
        </div>
    </section>

    <section>
        <br>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <br>
                <h1 class="font-besley-medium">
                    Beneficios para
                    <span style="background-color: #f7dc4c;padding-left: 10px;padding-right: 10px;padding-top: -8px !important;">
                        tu empresa
                    </span>
                </h1>
            </div>
        </div>
        <br>
        <div class="row mt-4">

            <div class="col-md-4 text-center font-akshar">
                <div class="benefits-border-white">
                    <br>
                    <img src="{{ asset('images/landing/retiro/benefits/group 1ilovejob.png')}}" alt="Benefits" style="display: block; margin:auto;">
                    <br>
                    <p>
                        Mayor lealtad de <br> los colaboradores
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-center font-akshar">
                <div class="benefits-border-white">
                    <br>
                    <img src="{{ asset('images/landing/retiro/benefits/group 1ilovejob.png')}}" alt="Benefits"
                        style="display: block; margin:auto;">
                    <br>
                    <p>
                        Cursos con expertos <br> y lenguaje sencillo
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-center font-akshar">
                <div class="benefits-border-white">
                    <br>
                    <img src="{{ asset('images/landing/retiro/benefits/group 1ilovejob.png')}}" alt="Benefits"
                        style="display: block; margin:auto;">
                    <br>
                    <p>
                        Retención <br> de talento
                    </p>
                </div>
                <br><br><br>
            </div>
        </div>
    </section>
</div>
<section style="background-color: #f7dc4c">
    <div class="container">
        <br>
        <div class="row mt-4">
            <div class="col-md-12">
                <img src="{{ asset('images/landing/retiro/gifs/circulo-girando-v2.gif')}}" alt="Circulo girando" width="250" style="margin-top: -160px;">
            </div>
            <div class="col-md-12 text-center mt-4">
                <h1 class="font-besley-medium">
                    Fomenta una <span> cultura financiera</span> <br> en tu empresa
                </h1>
                <br>
                <p class="font-akshar" style="font-size: 26px;">
                    Desde pymes hasta corporativos, diseñamos cursos<br> con la base a las necesidades de cada empresa.
                </p>
                <a class="btn btn-dark text-uppercase font-weight-bold p-3 p-lg-3 mb-2">
                    SOLICITAR COTIZACIÓN
                </a>
                <!--<span style="background-color: #f7dc4c;">Formato:Presencial o virtual</span>-->
                <br><br><br>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- Scrips --}}
@push('scripts')

@endpush

@push('scripts-inline')

@endpush

