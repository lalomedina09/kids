<section>
    <h1 class="font-weight-bold">
        Descargables de curso
        <a href="#####" onclick="return toggle_area(&#39;descargables-de-curso&#39;);">
        <img src="/index_files/2. visualizacion curso-13.png" alt="" align="right" class="icon-30">
        </a>

        <hr>
    </h1>

    <div class="row collapse" id="descargables-de-curso">
        <div class="col-md-6 col-12">
            @if ($data['descargables'][$video] != null)
                <ul class="font-weight-bold font-size-xl">
                    @foreach ($data['descargables'][$video] as $item)
                        <li class="mt-4">
                            <a href="#####" class="text-dark">
                                {{ $item }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ $data['descargables_url'][$video] }}" class="btn btn-dark btn-pill font-weight-light font-size-md mt-5">
                    Descargar
                </a>
            @else
            <p class="font-weight-bold font-size-xl">
                Este curso no necesita de complementos para descargar
            </p>
            @endif
        </div>
        <div class="col-md-6 col-12 text-center d-md-inline d-none">
        <img src="/index_files/2. visualizacion curso-04.png" alt="" width="85%">
        </div>
        <hr>
    </div>


</section>
