@if ($advice)
<div class="row">
    <div class="col-md-12">
            <p class="text-white text-uppercase text-center small">
                Tu asesoría con
                <span class="text-danger text-uppercase text-center">
                    {{ $advice->advised->fullname }}
                </span> <br>
                comenzó <span class="text-danger text-uppercase text-center"> {{ getCustomDateHuman($advice->start_date) }} </span>
            </p>

    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <a href="{{ $advice->videocall_url }}" class="btn btn-pill btn-danger animated tada" title="{{ $advice->videocall_url }}">
            Unirme a la asesoría <i class="lni lni-video text-white" style="font-size:20px;"></i>
        </a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <p class="small text-danger">
            ¿Tu asesorado no se presentó a la asesoría? <br>
            <span class="text-white">
                De acuerdo con nuestras políticas, sí te presentaste a la asesoría y tu asesorado no se presentó es tu derecho recibir el pago completo.
                <br><br>
                Puedes brindar la opción a tu asesorado de reagendar la sesión si lo deseas, el asesorado podrá escoger entre las fechas que definiste en tu agenda.
            </span>
        </p>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-12 text-center">
        <p class="small text-danger">
            ¿Deseas ofrecer la opción de reagendar? <br>
        </p>
        <a href="perfil#asesorias" class="btn btn btn-pill btn-danger mr-5">
            Si
        </a>
        <a href="perfil#asesorias" class="btn btn btn-pill btn-white">
            No
        </a>
    </div>
</div>
@endif
