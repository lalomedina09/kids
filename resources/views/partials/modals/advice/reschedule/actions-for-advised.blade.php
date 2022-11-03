<!--- Vista modal para los asesorados---->
<div class="row">
    <div class="col-md-12">
        <p class="text-white text-uppercase text-center small">
            <span class="text-danger">Atención</span> <br> {{ $advice->advised->fullname }}
        </p>
        <p class="small mb-1 text-center text-danger">
            <b>- - - - - - - - - - - - - -  - - - - - - - -</b>
            <!--<b>Proceso Reagendar:</b>-->
             <br> <br>
            {{-- legendsReschedule($reschedule) --}}
        </p>

        <div class="text-center">
            @switch($reschedule->status)
                @case(2)
                    <p class="small mb-1 text-center">
                        Tu asesor te ofrece <b>Re-agendar</b> la asesoria,<br>
                        elige la nueva fecha desde el botón <b>"Ver solicitud del asesor"</b>
                    </p>
                    <br>
                    <a href="{{ route('qd.advice.advice.reschedule.edit', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5 animated tada">
                        Ver Solicitud del asesor
                    </a>
                    @break
                @case(3)
                    <p class="small mb-1 text-center">
                        <b>Re agendaste</b> la asesoria, espera que tu asesor <b>acepte</b> o <b>rechace</b>
                        la nueva fecha, Si tu asesor <b>no cambia el status</b> tu asesoría se llevará acabo en la nueva fecha que elegiste
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
                @case(4)
                    <p class="small mb-1 text-center">
                        <b>¡Buenas noticias!</b>
                        Tu solicitud fue <b>aprobada</b> por tu asesor <span class="text-danger">{{ $advice->advisor->fullname }} </span>
                        para la nueva fecha
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
                        <b>¡Malas noticias!</b>
                        Tu solicitud fue <b>rechazada</b> por tu asesor <span class="text-danger">{{ $advice->advisor->fullname }} </span>

                    </p>
                    <p class="small text-danger">
                        ¿Tu asesor no se presentó a la asesoría? <br>
                        <span class="text-white">
                            De acuerdo con <b>nuestras políticas</b>, sí te presentaste a la asesoría y tu asesor no se
                            presentó es tu <b>derecho de solicitar</b> una devolución.
                        </span>
                    </p>
                    <a href="{{ route('qd.advice.advice.reschedule.edit', [$advice->hashid]) }}"
                            class="btn btn-pill btn-danger animated tada mb-3"
                            target="_blank">
                            Solicitar devolución
                    </a>
                    <br><br>
                    <a href="{{ url('politicas-de-devoluciones')}}" target="_blank">Ver Politicas de devoluciones</a>
                    @break
                @case(6)
                    <p class="small mb-1 text-center">
                        Solicitaste el reembolso, <br>
                        pronto tendras noticias del equipo <span class="text-danger">Querido Dinero</span>
                    </p>
                    @break
                @case(7)
                    <p class="small mb-1 text-center">
                        Hola el asesor <span class="text-danger">{{ $advice->advisor->fullname }}</span>, <br>
                        Bloqueo la opción de reagendar asesoría <br> ya que no te presentaste a tiempo a la asesoría
                    </p>
                    @break
                @case(8)
                    <p class="small mb-1 text-center">
                        Hola el asesor <span class="text-danger">{{ $advice->advisor->fullname }}</span>, <br>
                        esta contemplando ofrecer la oportunidad de  reagendar la asesoria
                        ya que no te presentaste a tiempo
                    </p>
                    @break
                @case(9)
                    <p class="small mb-1 text-center">
                        Hola el asesor <span class="text-danger">{{ $advice->advisor->fullname }}</span> , <br>
                        te ofrecio reagendar la asesoría, elije una nueva fecha
                    </p>
                    <br>
                    <a href="{{ route('qd.advice.advice.reschedule.edit', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5 animated tada">
                        Ver Solicitud del asesor
                    </a>
                    @break
                @case(10)
                    <p class="small mb-1 text-center">
                        Enviaste solicitud de actualiación de calendario a tu asesor
                         <span class="text-danger">{{ $advice->advisor->fullname }}</span> , <br>
                        Sino actualiza su agenda puedes solicitar la devolución
                    </p>
                    @break
                @case(11)
                    <p class="small mb-1 text-center">
                        Hola tu asesor <span class="text-danger">{{ $advice->advisor->fullname }}</span> , <br>
                        actualizo su calendario, revisa las fechas para que re agendes la asesoría
                    </p>
                    <br>
                    <a href="{{ route('qd.advice.advice.reschedule.edit', [$advice->hashid]) }}" class="btn btn btn-pill btn-danger mr-5 animated tada">
                        Re agendar
                    </a>
                    @break
                @default
            @endswitch
        </div>
    </div>
</div>
