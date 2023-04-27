<div class="row mt-1">
    <div class="col-md-12 ">
        <div style="background-color: #eeeeee;margin-left: 10px;margin-right: 10px;">
            <div class="row line-buttom">
                <div class="col-md-1 mt-4 text-center">
                    <img src="{{ asset('images/tools/budget/plus.png') }}" width="20" alt="Minimizar">
                </div>
                <div class="col-md-4 mt-4">
                    <img src="{{ asset('images/tools/budget/cat-fijos.png') }}" width="25" alt="Minimizar"> <span class="text-bold"> Fijos</span>
                </div>

                @include('partials.profiles.components.tools.components.budget.view-month.categories.components.exits.header-amount-category')

                <div class="col-md-12">
                    <div class="bordertest">
                        <div class="row">
                            <div class=" col-md-4 text-left">
                               <span style="font-size: .8rem">  (Lo que necesitas para vivir) </span>
                            </div>
                            <div class=" col-md-8 text-right">
                                <span style="font-size: .8rem"> Gasta el <span class="text-bold">50%</span>  de tus ingresos (Hasta $5,000)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.profiles.components.tools.components.budget.view-month.categories.components.exits.header-columns')

            @include('partials.profiles.components.tools.components.budget.view-month.categories.components.exits.fijos-rows')

            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-add-move col-12">
                        <i class="lni lni-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
