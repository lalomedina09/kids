<div class="row mt-1">
    <div class="col-md-12 ">
        <div style="background-color: #eeeeee;margin-left: 10px;margin-right: 10px;">
            <div class="row line-buttom">
                <!-- Particula: Boton minimizar o maximizar lista de categorias-->
                @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_min_or_max')

                <div class="col-md-4 mt-4">
                    <img src="{{ asset('images/tools/budget/cat-fijos.png') }}" width="25" alt="Icono Categoria">
                    <span class="text-bold">
                        Ingresos Constantes
                    </span>
                </div>

                @include('partials.profiles.components.tools.components.budget.view-month.categories.components.entrances.header-amount-category')

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
            @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.entrances._rows',
            array('rows' => $data['constantes']))

            <br>
            <!-- Particula: Boton que llamara al modal para agregar movimientos-->
            @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._btn_add_move')

        </div>
    </div>
</div>
