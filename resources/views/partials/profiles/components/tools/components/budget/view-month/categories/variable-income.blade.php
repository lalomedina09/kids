<div class="row">
    <div class="col-md-12 ">
        <div style="background-color: #eeeeee;margin-left: 10px;margin-right: 10px;">
            <div class="row line-buttom">
                <!-- Particula: Boton minimizar o maximizar lista de categorias-->
                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_min_or_max')

                <div class="col-md-4 mt-4">
                    <img src="{{ asset('images/tools/budget/cat-fijos.png') }}" width="25" alt="Minimizar">
                    <span class="text-bold"> Ingresos Variables</span>
                </div>
                @php
                    $counter = 1;
                    $section = "entrances";
                    $categoryRows = $data['variables']->get();
                    $idArrowsName = "arrowsCategoryVariables";
                    $idCategoryAmountReal = "arrowsCategoryVariablesAmountReal";
                    $idCategoryAmountEstimate = "arrowsCategoryVariablesAmountEstimate";
                @endphp

                @include('partials.profiles.components.tools.components.budget.view-month.categories.components.entrances.header-amount-category',
                array(
                    'amount_estimate' => $data['variables']->sum('amount_estimated'),
                    'amount_real' => $data['variables']->sum('amount_real')
                    )
                )

                <div class="col-md-12">
                    <div class="bordertest">
                        <div class="row">
                            <div class=" col-md-4 text-left">
                               <!--<span style="font-size: .8rem">  (Lo que necesitas para vivir) </span>-->
                            </div>
                            <div class=" col-md-8 text-right">
                                <span style="font-size: .8rem">
                                    Gasta el
                                    <span class="text-bold">50%</span>
                                    de tus ingresos (Hasta $5,000)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Particula: Encabezados de inputs 4 columnas -->
            @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.entrances._header_columns')

            <!-- Particula: Renglones para mostrar las categorías -->
            <!-- Variables de la parte superior funcionan para el siguiente include-->
            <div id="{{ $idArrowsName }}">
                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._rows')
            </div>
            <br>
            <!-- Particula: Boton que llamara al modal para agregar movimientos-->
            @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_add_move',
                array(
                    'section' => 'entrances',
                    'category_id' => 5,
                    'idArrowsName' => $idArrowsName,
                    'idCategoryAmountReal' => $idCategoryAmountReal,
                    'idCategoryAmountEstimate' => $idCategoryAmountEstimate
            ))
        </div>
    </div>
</div>
