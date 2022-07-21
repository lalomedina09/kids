
        <div class="postheader image-background">
            <div class="container-fluid">
                <div class="pt-5 text-center"> </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-12"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-12">
                        <img src="{{ asset('index_files/2. visualizacion curso-05.png') }}" alt="QD Play" width="110">

                        <h1 class="mb-5 text-left font-weight-bold title-underline-left title-underline-b mt-3">
                            Comienza tu vida adulta <br>
                            <span class="text-green">
                                con el pie derecho
                            </span>
                        </h1>
                        <div class="col-md-10">
                            <p class="font-weight-normal">
                                ¿Buscas un instructivo para la adultez?
                                Estás en el lugar correcto. Este plan
                                de cursos te dará los conocimientos
                                necesarios para tener una buena
                                relación con tus impuestos, el mundo inmobiliario y tu pareja.
                            </p>
                        </div>
                        <div class="text-left mb-5 mt-4">
                            @if (count($statusBuy) == 0)
                                <a href="@auth # @else #login-modal @endauth"
                                    class="btn btn-pill bg-green-blue text-white font-size-md font-weight-normal font-weight-bold text-transform-none btn-rounded"
                                    @auth data-fullmodal="#modal-checkout" @else data-toggle="modal" @endauth>
                                    Compra el paquete <span class="text-black">por sólo $299 MXN</span>
                                </a>
                            @else
                                <a href="{{ url('qdplay/ver/1') }}"
                                    class="btn btn-pill bg-green-blue text-white font-size-md font-weight-normal font-weight-bold text-transform-none btn-rounded"
                                    target="_blank">Ver Curso 1</a>
                            @endif
                            <!--<a href="" class="btn btn-pill bg-green-blue text-white font-size-md font-weight-normal font-weight-bold text-transform-none btn-rounded">
                                Compra el paquete <span class="text-black">por sólo $299 MXN</span>
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>


