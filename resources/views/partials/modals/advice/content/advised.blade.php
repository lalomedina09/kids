<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center ">
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
        <p class=" text-danger text-center">
            ¿No sabes cómo acceder a la asesoría? <br>
            <span class="text-white">
                Da clic aquí para conectarte a la sesión por videollamada.
            </span>
        </p>
        <!-- href="{{-- $advice->videocall_url --}}" -->
        <a href="#" onclick="registerUserConnected('{{$advice->id}}', '{{$advice->videocall_url}}');" class="btn btn-pill btn-danger animated tada" title="{{ $advice->videocall_url }}">
            Unirme a la asesoría <i class="lni lni-video text-white" style="font-size:20px;"></i>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <p class=" text-danger text-center">
            ¿Tu asesor no se presentó a la asesoría? <br>
            <span class="text-white">
                De acuerdo con <b>nuestras políticas</b>, sí te presentaste a la asesoría y tu asesor no se
                presentó es tu <b>derecho de solicitar</b> una devolución.
            </span>
        </p>
        <a href="{{ route('qd.advice.advice.refund.index', [$advice->hashid]) }}"
            class="btn btn-pill btn-white animated tada mb-3"
            target="_blank">
            Solicitar devolución
        </a>
    </div>
</div>
