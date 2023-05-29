<div class="col-md-4">
    <div class="calendar-card-month">
        <div class="row mb-1">
            <div class="col-md-12 text-center mt-3">
                <div class="row">
                    <div class="col-md-12 text-right" style="margin-bottom: -20px;">
                        <!--<a href="#"
                        onclick="openModalBudgetZoom('{{ $_month['month'] }}', '{{ $_month['start_month'] }}', '{{ $_month['end_month'] }}');"
                        style="margin-right: 10px;">
                            <img src="{{ asset('images/tools/budget/zoom-in.png') }}" width="25" alt="Zoom">
                        </a>-->
                    </div>
                    <div class="col-md-12 text-center">
                        <span class="b-calendar-name-month">
                            {{ $_month['month'] }}
                        </span>
                    </div>
                </div>
                <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
                <span style="font-weight:700; font-size: 1.1rem;">Lo que entra</span>
                <br>
                <!---->
                <div class="b-calendar-div-amounts">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-bg-gradient">
                                <div class="space-left-in" style="margin-left: 0px;">
                                    <span class="b-calendar-div-amounts-span">Estimado </span>
                                    <p class="b-calendar-div-amounts-p">
                                        @if($_month['enter_estimate']>0)
                                            ${{ number_format($_month['enter_estimate'], 2) }}
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
                                    <span class="b-calendar-div-amounts-span">Real </span>
                                    <p class="b-calendar-div-amounts-p">
                                        @if($_month['enter_real']>0)
                                            ${{ number_format($_month['enter_real'], 2) }}
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
                <span style="font-weight:700; font-size: 1.1rem;">Lo que sale</span>
                <br>
                {{--@include('partials.profiles.components.tools.components.budget.view-year.calendar._card-out')--}}
                <!------------>
                <div class="b-calendar-div-amounts">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-bg-gradient">
                                <div class="space-left-in" style="margin-left: 0px;">
                                    <span class="b-calendar-div-amounts-span">Estimado </span>
                                    <p class="b-calendar-div-amounts-p">
                                        @if($_month['out_estimate']>0)
                                            ${{ number_format($_month['out_estimate'], 2) }}
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
                                    <span class="b-calendar-div-amounts-span">Real </span>
                                    <p class="b-calendar-div-amounts-p">
                                        @if($_month['out_real']>0)
                                            ${{ number_format($_month['out_real'], 2) }}
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

                @include('partials.profiles.components.tools.components.budget.view-year.calendar._categories')

                <div class="mb-3 mt-1">
                    <!--<a href="#"
                    onclick="openModalMoves('{{ $_month['month'] }}', '{{ $_month['start_month'] }}', '{{ $_month['end_month'] }}');" title="Ver movimientos del mes">
                        <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos">
                        <span style="font-weight:700; font-size: 1.1rem; color:#000;">Movimientos</span>
                        <img src="{{ asset('images/tools/budget/plus.png') }}" width="25" alt="Movimientos">
                    </a>-->
                </div>
            </div>
        </div>
    </div>
</div>
