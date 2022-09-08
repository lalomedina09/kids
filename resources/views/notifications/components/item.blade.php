
<div class="col-md-3 text-center">
    @if ($item->status == 1)
    <!-- Leido -->
        <i class="lni lni-checkmark" title="Leida" style="margin-top: 10%; font-size: 40px; font-weight: 900;"></i>
        <!--<a href="#" onclick="updateStatusNotification({{ $item->id }}, 0)" title="Marcar como no leido" >-->
        <!--</a>-->
    @else
    <!-- No Leido -->
        <a href="#" class="btn btn-dark btn-pill btn-xs mt-3" onclick="updateStatusNotification({{ $item->id }}, 1)" title="Marcar como leido" >
            Marcar como leido
            <!--<i class="lni lni-smile" style="margin-top: 45%; font-size: 40px; font-weight: 900;"></i>-->
        </a>
    @endif
</div>
<div class="col-md-9">
    {{ $item->getDateHuman($item->created_at) }} | <b>{{ $item->subject }}</b>
    <br>
    {{ $item->description }}
    @if($item->url)
       <span> <a href="{{ url($item->url) }}">Ver más</a> </span>
    @endif
</div>

