{{--@include('partials.profiles.components.tools.components.budget.components.modal-content._zoom_month')--}}
<div class="row">
    <div class="col-md-12">
        <div class="calendar-card-month">
            <div class="row mb-1">
                <div class="col-md-12 text-center mt-3">
                    <div class="row">
                        <div class="col-md-12 text-right" style="margin-bottom: -20px;">
                        </div>
                        <div class="col-md-12 text-center">
                        <span class="b-calendar-name-month-modal text-dark">
                            {{ $card['month'] }}
                        </span>
                            <br><br>
                        </div>
                    </div>
                    <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
                    <span class="text-dark" style="font-weight:700; font-size: 1.1rem;">Lo que entra</span>
                    <br>
                    <!---->
                    <div class="b-calendar-div-amounts">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-bg-gradient">
                                    <div class="space-left-in" style="margin-left: 0px;">
                                        <span class="b-calendar-div-amounts-span-modal">Estimado </span>
                                        <p class="b-calendar-div-amounts-p-modal">
                                            @if($card['enter_estimate']>0)
                                                ${{ number_format($card['enter_estimate'], 2) }}
                                            @else
                                                $0.00
                                            @endif
                                            <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-bg-gradient">
                                    <div class="space-left-in" style="margin-left: 0px;">
                                        <span class="b-calendar-div-amounts-span-modal">Real </span>
                                        <p class="b-calendar-div-amounts-p-modal">
                                            @if($card['enter_real']>0)
                                                ${{ number_format($card['enter_real'], 2) }}
                                            @else
                                                $0.00
                                            @endif
                                            <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--@include('partials.profiles.components.tools.components.budget.view-year.calendar._card-enter')--}}
                    <!---->
                    <img src="{{ asset('images/tools/budget/out-black.png') }}" width="30" alt="Lo que sale">
                    <span class="text-dark" style="font-weight:700; font-size: 1.1rem;">Lo que sale</span>
                    <br>
                    {{--@include('partials.profiles.components.tools.components.budget.view-year.calendar._card-out')--}}
                    <!------------>
                    <div class="b-calendar-div-amounts">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-bg-gradient">
                                    <div class="space-left-in" style="margin-left: 0px;">
                                        <span class="b-calendar-div-amounts-span-modal">Estimado </span>
                                        <p class="b-calendar-div-amounts-p-modal">
                                            @if($card['out_estimate']>0)
                                                ${{ number_format($card['out_estimate'], 2) }}
                                            @else
                                                $0.00
                                            @endif
                                            <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-bg-gradient">
                                    <div class="space-left-in" style="margin-left: 0px;">
                                        <span class="b-calendar-div-amounts-span-modal">Real </span>
                                        <p class="b-calendar-div-amounts-p-modal">
                                            @if($card['out_real']>0)
                                                ${{ number_format($card['out_real'], 2) }}
                                            @else
                                                $0.00
                                            @endif
                                            <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="" style="margin-right: 6%; margin-left: 6%;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('images/tools/budget/cat-fijos.png') }}" width="30" alt="Lo que sale">
                                <span class="rounded-corners-gradient-borders-modal text-dark">
                                {{ getPercentForCategory($card['enter_real'], $card['cat_fijo']) }}%
                            </span>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/tools/budget/cat-gustitos.png') }}" width="30" alt="Lo que sale">
                                <span class="rounded-corners-gradient-borders-modal text-dark">
                                {{ getPercentForCategory($card['enter_real'], $card['cat_gustos']) }}%
                            </span>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/tools/budget/cat-ahorro.png') }}" width="35" alt="Lo que sale">
                                <span class="rounded-corners-gradient-borders-modal text-dark">
                                {{ getPercentForCategory($card['enter_real'], $card['cat_ahorros']) }}%
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

