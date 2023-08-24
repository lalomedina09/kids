<div id="{{ str_slug(__('Report Annual')) }}" class="tab-pane">

    {{--@include('partials.profiles.components.tools.components.budget.components.header')--}}
    <!---------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="#{{ str_slug(__('Tools')) }}" class="custom-btn-link text-bold" data-toggle="tab">
                    <img src="{{ asset('images/tools/return.png') }}" alt="Return" width="20">
                        Herramientas
                </a>
                <span class="text-bold"> | Presupuesto </span>
                <br>
                <span class="text-right small"> Crea tu presupuesto basandote en el principio 50% / 30% / 20%</span>
            </div>

            <div class="col-md-4">
                <a href="#{{ str_slug(__('Section View Month')) }}"
                    data-toggle="tab"
                    id="btn-section-month-top"
                    onclick="activeBudgetSectionMonth();"
                    class="btn-a-style-none">
                    <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Mensual">
                    <span class="small text-bold">Visualización Mensual</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#{{ str_slug(__('Section View Year')) }}"
                    data-toggle="tab"
                    id="btn-section-year-top"
                    onclick="activeBudgetSectionYear();"
                    class="btn-a-style-none btn-line-buttom">
                    <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Calendario Anual">
                    <span class="small text-bold">Visualización Anual</span>
                </a>
            </div>
        </div>
    <!---------------------------------------------------------------------------------------->
    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class='notifications top-left' style="font-size: 12px;"></div>

    <div class="container" id="budget-section-year-header-report">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_header')
    </div>

    <div class="" style="background-color: #eee;" id="budget-section-year-report">
        {{--@include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body')--}}
    </div>

    <div class="row">
        <!------------------------------->
        <!--<div>
            <canvas id="layanan" width="240px" height="240px"></canvas>
        </div>

        <div>
            <canvas id="layanan_subbagian" width="240px" height="240px"></canvas>
        </div>-->
        <!------------------------------->
    </div>

</div>
