<div class="b-calendar-div-amounts">
    <div class="row">
        <div class="col-md-6">
            <div class="custom-bg-gradient">
                <div class="space-left-in" style="margin-left: 0px;">
                    <span class="b-calendar-div-amounts-span">Estimado </span>
                    <p class="b-calendar-div-amounts-p">${{ number_format($_month['out_estimate'], 2) }}
                        <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-bg-gradient">
                <div class="space-left-in" style="margin-left: 0px;">
                    <span class="b-calendar-div-amounts-span">Real </span>
                    <p class="b-calendar-div-amounts-p">${{ number_format($_month['out_real'], 2) }}
                        <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
