<!----- vista modal para el couch--------->
<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center small">
            <span class="text-danger">Atención</span> <br> {{ $advice->advisor->fullname }}
        </p>
        <p class="small mb-1 text-center text-danger">
            <b>
                - - - - - - - - - - - - - -  - - - - - - - -
                <!--Proceso Reagendar:-->
            </b> <br> <br>
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
                            Hola tu asesorado <b>Re-agendo</b> la asesoria para hoy <br>
                            <span class="text-danger">
                                {{ $advice->present()->given_at }}
                            </span>
                            <br>
                            Al no responder a tiempo la solicitud, se llevará acabo
                            <br><br>
                    </p>
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
                        Hola bloqueaste la opcion de reagendar a tu asesorado <span class="text-danger">{{ $advice->advised->fullname }}</span>
                        para llevar acabo esta asesoría
                    </p>
                    @break
                @case(8)
                    <p class="small mb-1 text-center">
                        ¿Tienes pensado ofrecer la oportunidad de reagendar la asesoría a
                        <span class="text-danger">
                            {{ $advice->advised->fullname }}
                        </span> ?
                    </p>
                    <a href="{{ route('qd.advice.advice.reschedule.after.option.reschedule', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5">
                        Ofrecer reagendar
                    </a>
                    @break
                @case(9)
                    <p class="small mb-1 text-center">
                        Le enviaste la opción de reagendar asesoría a tu asesorado
                        <span class="text-danger">
                            {{ $advice->advised->fullname }}
                        </span>
                        <span class="text-danger"> espera que elija </span> una nueva fecha
                    </p>
                    @break
                @case(10)
                    <p class="small mb-1 text-center">
                        Tu asesorado
                        <span class="text-danger">
                            {{ $advice->advised->fullname }}
                        </span> <br>
                        Te envio una solicitud para que actualices tu calendario ya que no encontró
                        fechas que se adapten a su agenda
                        <span class="text-danger"> Msj: </span> {{ $reschedule->description }}
                    </p>
                    @break
                @case(11)
                    <p class="small mb-1 text-center">
                        Enviaste notificación a <br>
                        <span class="text-danger">
                            {{ $advice->advised->fullname }}
                        </span> <br>
                        Para que vuelva a elegir una nueva fecha y re agende la asesoría
                    </p>
                    @break
                @default
            @endswitch
        </div>
    </div>
</div>
