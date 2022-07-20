<section>
    <h1 class="text-center font-weight-bold title-underline title-underline-b mt-5">
        ¿Qué incluye?</span>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 mt-3">
                <div class="row mt-5">
                    <div class="col-md-1"></div>
                    <div class="col-md-2 col-md-offset-1 text-right">
                        <img src="{{ asset('index_files/experimento/start.png') }}" alt="" width="60%">
                    </div>
                    <div class="col-md-9">
                        <p class="font-weight-normal">
                                3 cursos: <br>
                                <b>pre-grabados</b>
                            </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-2 col-md-offset-1 text-right">
                        <img src="{{ asset('index_files/experimento/start.png') }}" alt="" width="60%">
                    </div>
                    <div class="col-md-9">
                        <p class="font-weight-normal">
                                Cada curso incluye: <br>
                                <b>Recursos descargables</b>
                            </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-2 col-md-offset-1 text-right">
                        <img src="{{ asset('index_files/experimento/start.png') }}" alt="" width="60%">
                    </div>
                    <div class="col-md-9">
                        <p class="font-weight-normal">
                                Acceso a la grabación <br>
                                <b>durante 30 días</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('index_files/1. pantalla principal imagenes-06.png') }}" alt="" width="70%">
            </div>
        </div>
    </div>

    <div class="text-center mb-5">
        <p>
            Puedes mandar tus preguntas a <b><span class="text-secondary">miriam</span>@queridodinero </b><br>
            y se te contestarán en un plazo de <b>72 hrs.</b>
        </p>
    </div>

    <div class="text-center mb-5 mt-4">
         @if ($buy == false)
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
    </div>
</section>
