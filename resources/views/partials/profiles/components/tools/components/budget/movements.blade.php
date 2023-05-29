<div id="{{ str_slug(__('Section Movements')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container">
        <div class="row">
           @include('partials.profiles.components.tools.components.budget.view-month.header')
        </div>

        @include('partials.profiles.components.tools.components.budget.view-month.sub-header-btns')

    </div>

    <div class="" style="background-color: #eee;">
        <div class="row mt-1">
            <div class="col-md-12 mt-4">
                <div style="background-color: #eeeeee">
                    <div class="row line-buttom">
                        <div class="col-md-5 mt-3 ml-4 mb-4">
                            <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos Dark">
                            <span class="text-bold"> Movimientos</span>
                        </div>
                    </div>
                    <!---------  Mostrar esta tabla si se encuentran movimientos ------------->
                    <div id="table-movements">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                @include('partials.components.loading-bg-gray')
                            </div>
                        </div>
                        {{-- Comente este include porque se alimentara desde el ajax --}}
                        {{--@include('partials.profiles.components.tools.components.budget.view-month.moves.table')--}}
                    </div>
                    <!------------  Div para mostrar mensaje donde no hay movimientos que se deben mostrar---------->
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>
