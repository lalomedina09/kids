<div id="{{ str_slug(__('Section View Month')) }}" class="tab-pane">

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
                class="btn-a-style-none btn-line-buttom">
                <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Mensual">
                <span class="small text-bold">Visualización Mensual</span>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#{{ str_slug(__('Section View Year')) }}"
                data-toggle="tab"
                id="btn-section-year-top"
                onclick="activeBudgetSectionYear();"
                class="btn-a-style-none ">
                <img src="{{ asset('images/tools/budget/eye.png') }}" width="30" alt="Visualizacion Calendario Anual">
                <span class="small text-bold">Visualización Anual</span>
            </a>
        </div>
    </div>
    <!---------------------------------------------------------------------------------------->
    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container" id="budget-section-month-header">
        <!-- Aqui van archivos de pre load header month---->
        @php
            $year = \Carbon\Carbon::now()->format('Y');
            $month = \Carbon\Carbon::now()->format('m');
            $section = "entrances";
        @endphp
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_header')

    </div>

    <div class="" style="background-color: #eee;" id="budget-section-month-content">
        <!-- Aqui van archivos de pre load body month-->
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_body')
    </div>

    <!-- Modal Add Move -->
    <div class="modal fade" id="modalAddMoveBudget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-add-move" style="border-radius: 20px;">
                <div class="modal-body">
                    <div id="contentModalAddMove">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Move -->
    <div class="modal fade" id="modalDeleteMoveBudget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-delete-move" style="border-radius: 20px;">
                <div class="modal-body">
                    <div id="contentModalDeleteMove">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------->
</div>
