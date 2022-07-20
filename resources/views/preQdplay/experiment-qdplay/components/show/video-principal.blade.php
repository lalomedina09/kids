<section>
    <h1 class="font-weight-bold">
        {{ $data['title_principal'][$video] }}
        <!--<span class="tag bg-green-blue small font-weight-bold">Fiscal</span>-->
        <hr>
    </h1>

    <h2 class="row">
    <div class="col-md-10 col-8">
        <span class="font-weight-bold">Video {{ $video }}:</span>
        <span class="font-weight-lighter">{{ $data['title_video'][$video] }}</span>
    </div>

    <div class="col-md-2 col-4 text-right font-weight-bold">
        <a href="#####" class="text-dark">
            <img src="/index_files/2. visualizacion curso-08.png" class="icon-25" alt="Me gusta">
            20
        </a>
    </div>
    </h2>
    <!--autoplay -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <video controls
                muted
                preload="auto"
                poster="{{ asset($data['url_poster'][$video]) }}"
                class="video-main-responsive">
            @if ($buy == false)
                <source src="{{ asset($data['url_video_intro'][$video]) }}" type="video/mp4" />
            @else
                <source src="{{ asset($data['url_video_main'][$video]) }}" type="video/mp4" />
            @endif
            <!--<source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.webm" type="video/webm" />
            <source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.ogv" type="video/ogg" />-->
            <!--Tu navegador no soporta HTML5 Video-->
            Actualiza tu navegador o intenta abrir la pagina en Google Chrome
        </video>
        <hr>
    </div>
</section>
