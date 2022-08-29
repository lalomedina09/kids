
<div class="col-md-1 text-center">
    @if ($item->status == 1)
    <!-- Leido -->
        <i class="lni lni-checkmark" title="Leida" style="margin-top: 45%; font-size: 40px; font-weight: 900;"></i>
        <!--<a href="#" onclick="updateStatusNotification({{ $item->id }}, 0)" title="Marcar como no leido" >-->
        <!--</a>-->
    @else
    <!-- No Leido -->
        <a href="#" onclick="updateStatusNotification({{ $item->id }}, 1)" title="Marcar como leido" >
            <i class="lni lni-smile" style="margin-top: 45%; font-size: 40px; font-weight: 900;"></i>
        </a>
    @endif
</div>
<div class="col-md-11">
    {{ $item->getDateHuman($item->created_at) }} | <b>{{ $item->subject }}</b>
    <br>
    {{ $item->description }} <br>
    @if($item->url) <a href="{{ url($item->url) }}">Ver más</a> @endif
</div>

