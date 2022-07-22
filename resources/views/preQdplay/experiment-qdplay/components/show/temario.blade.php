<section>
        <div class="row">
          <h1 class="col-md-5 col-12">
            <span class="font-weight-bold">Temario</span>
          </h1>
          <div class="col-md-7 col-12">
            <!--<img src="/index_files/2. visualizacion curso-07.png" class="icon-25" alt="">-->
            <!--<span class="small text-muted">2 horas 30 minutos</span>-->
            <a href="#####" onclick="return toggle_area(&#39;mas-lecciones&#39;);">
            <img src="/index_files/2. visualizacion curso-13.png" alt="" align="right" class="icon-30">
          </a>
          </div>
        </div>
        <hr class="h1">
        <div id="mas-lecciones" class="">

            @php
                $list = explode("###", $data['temario'][$video]);
                $contador = 1;
            @endphp
            @foreach ($list as $tema)
                @if ($tema)
                    <div class="row">
                    <div class="col-md-1 text-right">
                        <p class="font-weight-bold font-size-xl">
                            <span class="text-green">{{ $contador++}} - </span>
                        </p>
                    </div>
                    <div class="col-md-11 text-left">
                        <p class="font-weight-bold font-size-xl">
                                {{ $tema }}
                                <!--<img src="{{ asset('/index_files/experimento/security.png') }}" alt="*" class="icon-20">-->
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
          <hr>
        </div>
      </section>
