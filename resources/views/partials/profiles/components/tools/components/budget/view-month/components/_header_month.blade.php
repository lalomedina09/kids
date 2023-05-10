<div class="col-md-3">
    <p class="small text-white text-bold mt-2" style="font-size: 1.1rem;">Resumen del mes</p>
</div>
<div class="col-md-3">
    <div class="custom-bg-white">
        <div class="space-left-in mt-2">
            <span style="font-size: .8rem">Lo que entra</span>
            <br>
            <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($entrances, 2) }}
                <span style="font-size: .8rem">MXN</span>
            </p>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="custom-bg-white">
        <div class="space-left-in mt-2">
            <span style="font-size: .8rem">Lo que sale</span>
            <br>
            <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($exists, 2) }}
                <span style="font-size: .8rem">MXN</span>
            </p>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="custom-bg-white">
        <div class="space-left-in mt-2">
            <span style="font-size: .8rem">Total</span>
            <br>
            <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($total, 2) }}
                <span style="font-size: .8rem">MXN</span>
            </p>
        </div>
    </div>
</div>

