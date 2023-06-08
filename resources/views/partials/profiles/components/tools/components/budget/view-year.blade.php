<div id="{{ str_slug(__('Section View Year')) }}" class="tab-pane">

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

    <div class="container" id="budget-section-year-header">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_header')
    </div>

    <div class="" style="background-color: #eee;" id="budget-section-year">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body')
    </div>

    <!-------------------- ver movimientos del mes---------------------------------------------->
    <div class="modal fade" id="modalMoves" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <!--<div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;">
                        Movimientos de Abril
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                    </button>
                </div>-->
                <div class="modal-body">
                    <div id="contentModalMoves">

                    </div>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------ zoom del mes ---------------------------------------------------->
    <div class="modal fade" id="modalZoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <!--<div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                    </button>
                </div>-->
                <div class="modal-body">
                    <div id="contentModalZoom">

                    </div>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------>
</div>
