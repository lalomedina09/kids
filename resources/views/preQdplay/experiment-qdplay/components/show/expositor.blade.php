<section>
        <h1 class="font-weight-bold">
          Sobre tu expositor
          <a href="#####" onclick="return toggle_area(&#39;sobre-tu-expositor&#39;);">
            <img src="/index_files/2. visualizacion curso-13.png" alt="" align="right" class="icon-30">
          </a>

          <hr>
        </h1>

        <div class="row collapse" id="sobre-tu-expositor">
          <div class="expositor-bg"></div>
          <div class="col-lg-5 col-12 text-right">
            <img src="{{ asset($data['foto_perfil'][$video])}}" alt="" class="expositor-photo">
          </div>
          <div class="col-lg-7 col-12">
            <div style="margin-left: 10%">
                <div class="h2 font-weight-bold mt-4">Ludivina Córdoba Delgado</div>
                <div class="font-weight-light font-size-lg text-danger mt-4">ASESOR FINANCIERO Y BANCARIO</div>
                <div class="h3 font-weight-bold title-sideline title-sideline-danger title-sideline-l mt-4">Acerca de mí</div>
                <div class="font-weight-light font-size-lg mt-4">Lic. en Negocios Internacionales por la Universidad Anáhuac con Master en Dirección Estratégica por la U. Francisco de Vitoria (Madrid). Co-fundadora de Making Makers, plataforma ed-tech para acelerar tus habilidades profesionales en Finanzas, Marketing y Liderazgo.</div>
                @if($data['link_asesor'][$video])
                    <a href="{{url($data['link_asesor'][$video])}}" target="_blank" class="btn btn-dark btn-pill font-weight-light font-size-md mt-3">
                        Ver perfil completo
                    </a>
                @endif
            </div>
          </div>
        </div>


      </section>
