<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center small">
            <span class="text-danger">Atención</span> <br> {{ $advice->advised->fullname }}
        </p>
        <p class="small mb-1 text-center text-danger"><b>Proceso Reagendar:</b> <br> <br>
            {{-- legendsReschedule($reschedule) --}}
        </p>

        <div class="text-center">
            @switch($reschedule->status)
                @case(2)
                    <p class="small mb-1 text-center">
                        <b>Recuerda</b> que le enviaste una propuesta al asesorado <br>
                        para <b>reagendar la fecha</b> de asesoría
                    </p><br>
                    <span class="badge badge-danger">
                        Esperando respuesta del asesorado ...
                    </span>
                    @break
                @case(3)
                    <p class="small mb-1 text-center">
                        Hola tu asesorado <b>Re-agendo</b> la asesoria, <b>acepta</b> o <b>rechaza</b> la fecha
                        <span class="text-danger">
                            {{ $advice->present()->given_at }}
                        </span>
                        desde el botón de ver solicitud.
                        <br><br>
                        <b>Si no actualizas el estatus</b>
                        la asesoría se tomara como <span class="text-danger">confirmada</span> para la fecha solicitada por tu asesorado
                    </p>
                    <a href="{{ route('qd.advice.advice.reschedule.request', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5">
                        Ver solicitud
                    </a>
                    @break
                @case(4)
                    <p class="small mb-1 text-center">
                        <b>Aprobaste</b> la solicitud de <span class="text-danger">{{ $advice->advised->fullname }}</span> con la nueva fecha
                        <span class="text-danger">
                            {{ $advice->present()->given_at }}
                        </span>
                    </p>
                    <br>
                    <a href="{{ $advice->videocall_url }}" class="btn btn-pill btn-danger animated tada mb-3" title="{{ $advice->videocall_url }}">
                        Acceso a la asesoría <i class="lni lni-video text-white" style="font-size:20px;"></i>
                    </a>
                    <br>
                    @if ($advice->videocallHasPassword())
                        <span class="small">
                            <b>Contraseña de la videollamada:</b> {{ $advice->getVideocallPassword() }}
                        </span>
                    @endif
                    @break
                @case(5)
                    <p class="small mb-1 text-center">
                        Rechazaste la solicitud de tu asesorado
                    </p>
                    @break
                @case(6)
                    <p class="small mb-1 text-center">
                        Tu asesorado solicito el reembolso de la asesoría
                    </p>
                    @break
                @case(7)
                    <p class="small mb-1 text-center">
                        Hola bloqueaste la opcion de reagendar a tu asesorado {{ $advice->advised->fullname }}
                        para llevar acabo esta asesoría
                    </p>
                    @break
                @default
                        <!--  default -->
            @endswitch
        </div>
    </div>
</div>
