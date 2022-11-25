<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center ">
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
        <!-- href="{{-- $advice->videocall_url --}}" -->
        <a href="#" onclick="registerUserConnected('{{$advice->id}}', '{{$advice->videocall_url}}');" class="btn btn-pill btn-danger animated tada" title="{{ $advice->videocall_url }}">
            Unirme a la asesoría <i class="lni lni-video text-white" style="font-size:20px;"></i>
        </a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <p class=" text-danger">
            ¿Tu asesorado no se presentó a la asesoría? <br>
            <span class="text-white">
                De acuerdo con <b>nuestras políticas</b>, sí te presentaste a la asesoría y tu asesorado no se
                presentó es tu <b>derecho recibir</b> el pago completo.
                <br><br>
                Puedes brindar la opción a tu asesorado de <b>reagendar</b> la sesión si lo deseas,
                el asesorado podrá escoger entre las <b>fechas</b> que definiste en tu agenda.
            </span>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <p class=" text-danger">
            ¿Deseas ofrecer la opción de reagendar? <br>
        </p>
        <a href="{{ route('qd.advice.advice.reschedule.after.option.reschedule', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5">
            Si
        </a>
        <button  class="btn btn btn-pill btn-white" onclick="AdvisorBlockReschedule({{$advice->id}});">
            No
        </button>
    </div>
</div>
