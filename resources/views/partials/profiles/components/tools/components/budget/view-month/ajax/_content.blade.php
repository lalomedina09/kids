@switch($section)
    @case('entrances')
        @include('partials.profiles.components.tools.components.budget.view-month.categories.steady-income')
        @include('partials.profiles.components.tools.components.budget.view-month.categories.variable-income')
        @break
    @case('exits')
        @include('partials.profiles.components.tools.components.budget.view-month.categories.fijos')

        @include('partials.profiles.components.tools.components.budget.view-month.categories.gustos')

        @include('partials.profiles.components.tools.components.budget.view-month.categories.ahorros')
        @break
    @case('movements')
        <div class="row mt-1">
            <div class="col-md-12 mt-4">
                <div style="background-color: #eeeeee">
                    <div class="row line-buttom">
                        <div class="col-md-5 mt-3 ml-4 mb-4">
                            <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos Dark">
                            <span class="text-bold">
                                ({{ count($data['movements']) }}) Movimientos
                            </span>
                        </div>
                    </div>
                    <!---------  Mostrar esta tabla si se encuentran movimientos ------------->
                    <div id="table-movements">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{--dd($data['movements'])--}}
                                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.movements._table')
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        @break
@endswitch

