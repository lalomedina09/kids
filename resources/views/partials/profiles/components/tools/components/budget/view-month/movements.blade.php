<style>

</style>
<div class="row">
    <div class="col-md-12 mt-4">
        <div style="background-color: #eeeeee">
            <div class="row line-buttom">
                <div class="col-md-1 mt-3 text-center">
                    <img src="{{ asset('images/tools/budget/plus.png') }}" width="20" alt="Minimizar">
                </div>
                <div class="col-md-5 mt-3">
                    <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos Dark"> <span class="text-bold"> Movimientos</span>
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
