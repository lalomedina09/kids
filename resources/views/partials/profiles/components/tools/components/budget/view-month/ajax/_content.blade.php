@switch($section)
    @case('entrances')
        @php
            //Var categorias entradas para obtener montos mensuales
            $categoriesSteady = $data['constantes']->get()->pluck('id')->toArray();
            $categoriesVariable = $data['variables']->get()->pluck('id')->toArray();

            //Ingresos Constantes
            $amountSectionConstantesEstimate = getSumForCategory($categoriesSteady, $data['date'], "amount_estimated");
            $amountSectionConstantesReal = getSumForCategory($categoriesSteady, $data['date'], "amount_real");

            //Ingresos Variables
            $amountSectionVariablesReal = getSumForCategory($categoriesVariable, $data['date'], "amount_real");
            $amountSectionVariablesEstimate = getSumForCategory($categoriesVariable, $data['date'], "amount_estimated");
        @endphp

        @include('partials.profiles.components.tools.components.budget.view-month.categories.steady-income')
        @include('partials.profiles.components.tools.components.budget.view-month.categories.variable-income')

        @break
    @case('exits')
        @php
            //Var categorias salidas para obtener montos mensuales
            $categoriesFixed = $data['fijos']->get()->pluck('id')->toArray();
            $categoriesLikes = $data['gustos']->get()->pluck('id')->toArray();
            $categoriesSaving = $data['ahorros']->get()->pluck('id')->toArray();

            //Fijos
            $amountSectionFijosEstimate = getSumForCategory($categoriesFixed, $data['date'], "amount_estimated");
            $amountSectionFijosReal = getSumForCategory($categoriesFixed, $data['date'], "amount_real");

            //Gustos
            $amountSectionGustosEstimate = getSumForCategory($categoriesLikes, $data['date'], "amount_estimated");
            $amountSectionGustosReal = getSumForCategory($categoriesLikes, $data['date'], "amount_real");

            //Ahorros
            $amountSectionAhorrosEstimate = getSumForCategory($categoriesSaving, $data['date'], "amount_estimated");
            $amountSectionAhorrosReal = getSumForCategory($categoriesSaving, $data['date'], "amount_real");

        @endphp

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
                        <div class="col-md-6 mt-3 ml-4 mb-4 text-right">
                            <a class="btn bg-green-blue text-white p-1 p-xl-2"
                            href="{{ url('budget/active/month/download/pdf-moves/2023/6')}}">
                                Descargar PDF we
                            </a>
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

