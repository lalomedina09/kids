<section>
        <h1 class="font-weight-bold">
          Lo que aprenderás
          <a href="#####" onclick="return toggle_area(&#39;lo-que-aprendera&#39;);">
            <img src="/index_files/2. visualizacion curso-13.png" alt="" align="right" class="icon-30">
          </a>
          <hr>
        </h1>

        <div class="row collapse" id="lo-que-aprendera">
            <div class="row">
                <div class="col-md-7">
                    <p class="font-weight-light font-size-lg mt-4">
                        {{ $data['lo_que_aprenderas'][$video] }}
                    </p>
                </div>
                <div class="col-md-5">
                    <span class="tag bg-green-blue p-3 mb-3 font-size-lg font-weight-bold">
                        <img src="{{ asset('/index_files/experimento/start-black.png') }}" alt="*"
                        class="icon-25">
                        <img src="{{ asset('/index_files/experimento/start-white.png') }}" alt="*"
                        class="icon-25"><img src="{{ asset('/index_files/experimento/start-white.png') }}"
                        alt="*" class="icon-25">
                            Nivel principiante
                    </span>
                    <br>
                </div>
            </div>
            <hr>
        </div>

      </section>
