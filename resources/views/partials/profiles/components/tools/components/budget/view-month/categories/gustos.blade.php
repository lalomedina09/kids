<div class="row">
    <div class="col-md-12 mt-4">
        <div style="background-color: #eeeeee;margin-left: 10px;margin-right: 10px;">
            <div class="row line-buttom">
                @php
                    $counter = 1;
                    $section = "exits";
                    $categoryRows = $data['gustos']->get();
                    $idArrowsName = "arrowsCategoryTastes";
                    $idCategoryAmountReal = "arrowsCategoryTastesAmountReal";
                    $idCategoryAmountEstimate = "arrowsCategoryTastesAmountEstimate";
                @endphp
                <!-- Particula: Boton minimizar o maximizar lista de categorias-->
                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_min_or_max')

                <div class="col-md-5 mt-4">
                    <img src="{{ asset('images/tools/budget/cat-gustitos.png') }}" width="25" alt="Minimizar"> <span class="text-bold"> Gustos </span>
                </div>
                @include('partials.profiles.components.tools.components.budget.view-month.categories.components.exits.header-amount-category',
                array(
                    //'amount_estimate' => $data['gustos']->sum('amount_estimated'),
                    //'amount_real' => $data['gustos']->sum('amount_real')
                    'amount_estimate' => $amountSectionGustosEstimate,
                    'amount_real' => $amountSectionGustosReal
                    )
                )

                @php
                    //dd(Session::get('totalMonthSession'));
                    $total_month = Session::get('totalMonthSession');
                    if (Session::get('totalMonthSession'))
                    {
                        $percentLikes = ($total_month * 30) / 100;
                    }else{
                        $percentLikes = 0;
                    }
                @endphp
                <div class="col-md-12">
                    <div class="bordertest">
                        <div class="row">
                            <div class=" col-md-4 text-left">
                               <span style="font-size: .8rem">  (Lo que te hace feliz) </span>
                            </div>
                            <div class=" col-md-8 text-right">
                                <span style="font-size: .8rem"> Gasta el <span class="text-bold">30%</span>
                                de tus ingresos (Hasta ${{number_format($percentLikes, 2)}})</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Particula: Encabezados de inputs 4 columnas -->
            {{--@include('partials.profiles.components.tools.components.budget.view-month.ajax.components.exits._header_columns')--}}
            <!-- Particula: Renglones para mostrar las categorías -->
            <div id="{{ $idArrowsName }}">
                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._rows_beta',
                array(
                    'section' => 'exits',
                    'category_id' => 2,
                    'idArrowsName' => $idArrowsName,
                    'idCategoryAmountReal' => $idCategoryAmountReal,
                    'idCategoryAmountEstimate' => $idCategoryAmountEstimate
                ))
            </div>

            <br>
            <!-- Particula: Boton que llamara al modal para agregar movimientos-->
            @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_add_move',
                array(
                    'section' => 'exits',
                    'category_id' => 2,
                    'idArrowsName' => $idArrowsName,
                    'idCategoryAmountReal' => $idCategoryAmountReal,
                    'idCategoryAmountEstimate' => $idCategoryAmountEstimate
            ))
        </div>
    </div>
</div>
