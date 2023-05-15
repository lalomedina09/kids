<div id="{{ str_slug(__('Section View Year')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container" id="budget-section-year-header">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_header')
    </div>

    <div class="" style="background-color: #eee;" id="budget-section-year">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body')
    </div>

    <!-------------------- ver movimientos del mes---------------------------------------------->
    <div class="modal fade" id="modalMoves" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;">
                        Movimientos de Abril
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <div id="contentModalMoves">
                        @include('partials.profiles.components.tools.components.budget.components.modal-content._table_moves')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------ zoom del mes ---------------------------------------------------->
    <div class="modal fade" id="modalZoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                    </button>
                </div>
                <div class="modal-body">
                    <div id="contentModalZoom">
                        cuerpo de zoom
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------>
</div>
