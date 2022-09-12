<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center small">
            Tu asesoría con
            <span class="text-danger text-uppercase text-center">
                {{ $advice->advisor->fullname }}
            </span> <br>
            comenzó <span class="text-danger text-uppercase text-center"> {{ getCustomDateHuman($advice->start_date) }} </span>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <p class="small text-danger text-center">
            ¿No sabes cómo acceder a la asesoría? <br>
            <span class="text-white">
                Da clic aquí para conectarte a la sesión por videollamada.
            </span>
        </p>
        <a href="{{ $advice->videocall_url }}" class="btn btn-pill btn-danger animated tada" title="{{ $advice->videocall_url }}">
            Unirme a la asesoría <i class="lni lni-video text-white" style="font-size:20px;"></i>
        </a>
    </div>
</div>
