@extends('layouts.landing')

@section('content')

    <section class="container mt-2">
        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">¿Porqué asesorarme con Querido Dinero?</h1>

            <div class="row mx-0 mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/1.gif') }}" alt="" width="100%"
                        data-animate="visibleOnce" data-animation="fadeInDown">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Asesoría personalizada</h4>
                    <p class="font-weight-lighter">Elige entre diversos couches expertos en diferentes áreas financieras y recibe asesorías individuales según tu asunto.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/2.gif') }}" alt="" width="100%"
                        data-animate="visibleOnce" data-animation="fadeInDown">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Pago por asesoría</h4>
                    <p class="font-weight-lighter">Solo paga por el tiempo de tu asesoría y el precio que se ajuste a tu presupuesto.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/3.gif') }}" alt="" width="100%"
                        data-animate="visibleOnce" data-animation="fadeInDown">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Donde sea, cuando sea</h4>
                    <p class="font-weight-lighter">Obten asesorías en línea cuando y dónde te encuentres.</p>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">¿Cómo funciona?</h1>

            <div class="my-4">
                <div class="row"
                    data-animate="visibleOnce" data-animation="fadeInLeft">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 text-center">
                        <img src="{{ asset('images/landing/advice/g1.gif') }}" alt="" width="80%" class="rounded-lg">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4">
                        <h4 class="ml-3 mb-3 text-bold text-uppercase">
                            <span class="number-circle number-circle-left">1</span>
                            Elige al couch
                        </h4>
                        <p class="font-weight-lighter">Busca el tema el que requieras asesoría, ve los videos de los couches, su descripción, experiencia, precio y elige el que más se adapte a tus necesidades.</p>
                    </div>
                </div>

                <div class="row"
                    data-animate="visibleOnce" data-animation="fadeInRight">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 order-xl-first order-lg-first order-md-first order-last">
                        <h4 class="mb-3 text-bold text-uppercase">
                            <span class="number-circle number-circle-right">2</span>
                            Reserva tu asesoría
                        </h4>
                        <p class="font-weight-lighter">Revisa el calendario del couch, programa la fecha y hora que más te convenga.</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 order-xl-last order-lg-last order-md-last order-first text-center">
                        <img src="{{ asset('images/landing/advice/g2.gif') }}" alt="" width="80%" class="rounded-lg">
                    </div>
                </div>

                <div class="row"
                    data-animate="visibleOnce" data-animation="fadeInLeft">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 text-center">
                        <img src="{{ asset('images/landing/advice/g3.gif') }}" alt="" width="80%" class="rounded-lg">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4">
                        <h4 class="ml-3 mb-3 text-bold text-uppercase">
                            <span class="number-circle number-circle-left">3</span>
                            Soluciona tus dudas
                        </h4>
                        <p class="font-weight-lighter">Conecta con tu couch por medio de video llamada y soluciona tus problemas y/o dudas financieras.</p>
                    </div>
                </div>

                <div class="row"
                    data-animate="visibleOnce" data-animation="fadeInRight">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 order-xl-first order-lg-first order-md-first order-last">
                        <h4 class="mb-3 text-bold text-uppercase">
                            <span class="number-circle number-circle-right">4</span>
                            Califica a tu couch
                        </h4>
                        <p class="font-weight-lighter">Descarga tu plan de trabajo en nuestra plataforma y califica a tu couch.</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 p-4 order-xl-last order-lg-last order-md-last order-first text-center">
                        <img src="{{ asset('images/landing/advice/g4.gif') }}" alt="" width="80%" class="rounded-lg">
                    </div>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Ofrecemos asesorías en:</h1>
            </div>

            <div class="row mb-4">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l1.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Finanzas personales</h5>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l2.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Inversiones</h5>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l3.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Fiscal</h5>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l4.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Emprendimiento</h5>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l5.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Pymes</h5>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/l6.png') }}" alt="" width="80%" class="mb-3"
                    data-animate="visibleOnce" data-animation="flipInY">
                    <h5 class="font-weight-lighter">Prevención</h5>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('qd.advice.advisors.search') }}"
                    class="btn btn-pill btn-danger"
                    data-animate="visible" data-animation="heartBeat"
                >@lang('Reservar asesorías')</a>
            </div>

            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Requisitos</h1>
            </div>

            <div class="text-center">
                <h5 class="font-weight-lighter"><span class="fa fa-check fa-lg text-danger mr-1"></span>Tener una buena conexión a internet</h5>
                <h5 class="font-weight-lighter"><span class="fa fa-check fa-lg text-danger mr-1"></span>Contar con computadora o celular</h5>

                <img src="{{ asset('images/landing/advice/lg.gif') }}" alt="" width="60%" class="mb-3">
            </div>
            <hr>
        </section>

        <section>
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Incluye</h1>
            </div>

            <div class="row mb-5">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/la.png') }}" alt="" width="80%" class="mb-3">
                    <h5>
                        Sesión por videollamada
                        <br>
                        <span class="font-weight-lighter">(Vía Zoom)</span>
                    </h5>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/landing/advice/lb.png') }}" alt="" width="80%" class="mb-3">
                    <h5>
                        Plan de trabajo
                        <br>
                        <span class="font-weight-lighter">(Se compone de diagnóstico, solución y notas extras)</span>
                    </h5>
                </div>
            </div>

            <div class="text-center">
                <h5>Una vez terminada la asesoría puedes descargar el plan de trabajo desde <a href="https://www.queridodinero.com/perfil" class="text-danger">www.queridodinero.com/perfil</a></h5>

                <img src="{{ asset('images/landing/advice/lc.png') }}" alt="" width="150" class="my-4">

                <h5 class="text-bold text-uppercase">
                    <span style="border-bottom:4px solid #ff6161;">Garantía de duda resuelta o te regresamos tu dinero</span>
                </h5>
            </div>
        </section>
    </section>

    <div style="background-color:#FF6161;">
        <div class="container p-5 text-center">
            <h5 class="text-white text-uppercase">Resuelve tus dudas ahora</h5>
            <h5 class="text-white">Llena este formulario y recibe más información</h5>

            <div class="my-5">
                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
                    <form action="https://queridodinero.us11.list-manage.com/subscribe/post?u=1b50f97908854fb517fadf05c&amp;id=d20a9efb0d" method="post"
                        id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-row" target="_blank" novalidate>
                        <input type="checkbox" name="group[23489][1]" id="mce-group[23489]-23489-0" value="1" style="display:none;" checked>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mc-field-group">
                            <input type="text" name="FNAME"
                                id="mce-FNAME" class="form-control form-control-lg required"
                                placeholder="Nombre" value="">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mc-field-group">
                            <input type="text" name="LNAME"
                                id="mce-LNAME" class="form-control form-control-lg required"
                                placeholder="Apellidos" value="">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mc-field-group">
                            <input type="email" name="EMAIL"
                                id="mce-EMAIL" class="form-control form-control-lg required email"
                                placeholder="Correo electrónico" value="">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mc-field-group">
                            <select name="STATE" id="mce-STATE" class="form-control form-control-lg required" placeholder="Estado">
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

                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_1b50f97908854fb517fadf05c_d20a9efb0d" tabindex="-1" value="">
                        </div>

                        <div class="form-group col-12 clear">
                            <button id="mc-embedded-subscribe"
                                style="font-weight:bold;color:white;border:0px solid black;background-color:#4FD7DB;padding:15px 30px;display:inline-block;text-decoration:none;border-radius:5px;width:100%;"
                            >!Quiero más información!</button>
                        </div>
                    </form>
                </div>

                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[8]='STATE';ftypes[8]='dropdown';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                <!--End mc_embed_signup-->
            </div>
        </div>
    </div>

@endsection
