@extends('layouts.landing')

@section('content')

    <section class="container mt-2">
        <section>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                    <div class="text-center">
                        <h1>Resuelve tus <span class="text-danger">dudas en fiscal</span></h1>
                        <img src="{{ asset('images/landing/advice/f.gif') }}" width="300px">
                    </div>

                    <div class="mb-5">
                        <h5><span class="fa fa-check fa-lg text-danger mr-1"></span>Cómo emitir facturas</h5>
                        <h5><span class="fa fa-check fa-lg text-danger mr-1"></span>Cómo hacer la declaración anual</h5>
                        <h5><span class="fa fa-check fa-lg text-danger mr-1"></span>Conoce qué puedes deducir</h5>
                        <h5><span class="fa fa-check fa-lg text-danger mr-1"></span>El régimen fiscal adecuado para ti</h5>
                    </div>

                    <div class="d-flex flex-row align-items-center">
                        <img class="mr-2" src="{{ asset('images/landing/advice/lc.png') }}" width="70px">
                        <h5 class="text-bold text-uppercase m-0">Garantía de duda resuelta</h5>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                    <div class="p-4 rounded-lg text-center" style="background-color:#FF6161;">
                        <h5 class="text-white text-uppercase">Conoce más sobre nuestras mentorías personalizadas por videollamada</h5>

                        <div class="mt-5">
                            <!-- Begin Mailchimp Signup Form -->
                            <div id="mc_embed_signup">
                                <form action="https://queridodinero.us11.list-manage.com/subscribe/post?u=1b50f97908854fb517fadf05c&amp;id=d20a9efb0d" method="post"
                                    id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <input type="checkbox" name="group[23489][2]" id="mce-group[23489]-23489-1" value="2" style="display:none;" checked>

                                    <div class="form-group mc-field-group">
                                        <input type="text" name="FNAME"
                                            id="mce-FNAME" class="form-control form-control-lg required"
                                            placeholder="Nombre" value="">
                                    </div>

                                    <div class="form-group mc-field-group">
                                        <input type="text" name="LNAME"
                                            id="mce-LNAME" class="form-control form-control-lg required"
                                            placeholder="Apellidos" value="">
                                    </div>

                                    <div class="form-group mc-field-group">
                                        <input type="email" name="EMAIL"
                                            id="mce-EMAIL" class="form-control form-control-lg required email"
                                            placeholder="Correo electrónico" value="">
                                    </div>

                                    <div class="form-group mc-field-group">
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

                                    <div class="form-group clear">
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
            </div>
            <hr>
        </section>

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">¿Porqué asesorarme con Querido Dinero?</h1>

            <div class="row mx-0 mt-5">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/1.gif') }}" alt="" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Mentoría personalizada</h4>
                    <p class="font-weight-lighter">Elige entre diversos mentores expertos en diferentes áreas financieras y recibe mentorías individuales según tu asunto.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/2.gif') }}" alt="" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Pago por mentoría</h4>
                    <p class="font-weight-lighter">Solo paga por el tiempo de tu mentoría y el precio que se ajuste a tu presupuesto.</p>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <img src="{{ asset('images/landing/advice/3.gif') }}" alt="" width="100%">
                    <hr class="separator--danger">
                    <h4 class="mb-3 text-bold">Donde sea, cuando sea</h4>
                    <p class="font-weight-lighter">Obten mentorías en línea cuando y dónde te encuentres.</p>
                </div>
            </div>

            <hr>
        </section>

        <section>
            <h1 class="title-underline title-underline-b title-underline-danger text-center font-weight-lighter">¿Cómo funciona?</h1>

            <div class="my-5">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/landing/advice/g1.gif') }}" alt="" width="80%">
                        </div>
                        <h4 class="ml-3 mb-3 text-bold text-uppercase">Elige al mentor</h4>
                        <p class="font-weight-lighter">Busca el tema el que requieras mentoría, ve los videos de los mentores, su descripción, experiencia, precio y elige el que más se adapte a tus necesidades.</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/landing/advice/g2.gif') }}" alt="" width="80%">
                        </div>
                        <h4 class="mb-3 text-bold text-uppercase">Reserva tu mentoría</h4>
                        <p class="font-weight-lighter">Revisa el calendario del mentor, programa la fecha y hora que más te convenga.</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/landing/advice/g3.gif') }}" alt="" width="80%">
                        </div>
                        <h4 class="ml-3 mb-3 text-bold text-uppercase">Soluciona tus dudas</h4>
                        <p class="font-weight-lighter">Conecta con tu mentor por medio de video llamada y soluciona tus problemas y/o dudas financieras.</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/landing/advice/g4.gif') }}" alt="" width="80%">
                        </div>
                        <h4 class="mb-3 text-bold text-uppercase">Califica a tu mentor</h4>
                        <p class="font-weight-lighter">Descarga tu plan de trabajo en nuestra plataforma y califica a tu mentor.</p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('qd.advice.advisors.search', ['categories[]' => 43]) }}"
                        class="btn btn-pill btn-danger"
                        data-animate="visible" data-animation="heartBeat"
                    >@lang('Quiero reservar una mentoría')</a>
                </div>
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
                <h5>Una vez terminada la mentoría puedes descargar el plan de trabajo desde <a href="https://www.queridodinero.com/perfil" class="text-danger">www.queridodinero.com/perfil</a></h5>
            </div>
        </section>

        <section class="mt-5">
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Requisitos</h1>
            </div>

            <div class="text-center">
                <img src="{{ asset('qd/advice/images/w.gif') }}" alt="" width="150" class="mb-3">

                <h5 class="font-weight-lighter"><span class="fa fa-check fa-lg text-danger mr-1"></span>Tener una buena conexión a internet</h5>
                <h5 class="font-weight-lighter"><span class="fa fa-check fa-lg text-danger mr-1"></span>Contar con computadora o celular</h5>
            </div>

            <hr>
        </section>

        <section class="mt-5">
            <div class="text-center">
                <h1 class="title-underline title-underline-b title-underline-danger font-weight-lighter mb-5">Testimonios</h1>

                <img src="{{ asset('qd/advice/images/q.gif') }}" alt="" width="150" class="mb-3">
            </div>

            <div id="advice-testimonies" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#advice-testimonies" data-slide-to="0" class="bg-danger active"></li>
                    <li data-target="#advice-testimonies" data-slide-to="1" class="bg-danger"></li>
                    <li data-target="#advice-testimonies" data-slide-to="2" class="bg-danger"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                                <p>Me explicó muy bien, y fue paciente en mi caso que yo no se mucho o nada del tema que quería aclarar, si recomiendo su mentoría :)</p>
                                <p class="text-danger text-uppercase">Alexis Barranca</p>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item text-center">
                        <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                            <p>¡Aclaro todas mis dudas! Desglosó todo el proceso que tenía que hacer y lo explico a detalle. Muchas gracias.</p>
                            <p class="text-danger text-uppercase">Diego Alemán</p>
                        </div>
                    </div>

                    <div class="carousel-item text-center">
                        <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-8 offset-2 py-5">
                            <p>Sandra resolvió todas las dudas que tenía y me orientó para tomar las mejores decisiones de acuerdo a mis necesidades.</p>
                            <p class="text-danger text-uppercase">Jorge Luis Perales</p>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#advice-testimonies" data-slide="prev">
                    <span class="fa fa-chevron-left fa-3x text-danger" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#advice-testimonies" data-slide="next">
                    <span class="fa fa-chevron-right fa-3x text-danger" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </section>

@endsection
