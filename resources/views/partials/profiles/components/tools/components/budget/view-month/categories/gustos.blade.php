<div class="row">
    <div class="col-md-12 mt-4">
        <div style="background-color: #eeeeee">
            <div class="row line-buttom">
                <div class="col-md-1 mt-3 text-center">
                    <img src="{{ asset('images/tools/budget/plus.png') }}" width="20" alt="Minimizar">
                </div>
                <div class="col-md-5 mt-3">
                    <img src="{{ asset('images/tools/budget/cat-gustitos.png') }}" width="25" alt="Minimizar"> <span class="text-bold"> Gustos</span>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="custom-bg-gradient">
                        <div class="space-left-in">
                            <span style="font-size: .8rem">Lo que creo que voy a gastar
                            </span>
                            <p class="text-bold" style="font-size: 1.3rem; color:#fff">$6,000
                                <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="custom-bg-gradient">
                        <div class="space-left-in">
                            <span style="font-size: .8rem">Lo que gasté </span>
                            <p class="text-bold" style="font-size: 1.3rem; color:#fff">$4,700
                                <span class="text-bold" style="font-size: .8rem; color:#000;">MXN</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center small">
                   <span class="text-bold" style="font-size: 0.9rem;">
                        Concepto
                    </span>
                </div>
                <div class="col-md-4 text-center small">
                    <span class="text-bold" style="font-size: 0.9rem;">
                        Lo que creo que voy a gastar
                    </span>
                </div>
                <div class="col-md-3 text-center small">
                    <span class="text-bold" style="font-size: 0.9rem;">
                        Lo que gasté
                    </span>
                </div>
                <div class="col-md-2 text-center small">
                    <span class="text-bold" style="font-size: 0.9rem;">
                        Fecha
                    </span>
                </div>
                <br>
            </div>
            {{--@include('partials.profiles.components.tools.components.budget.view-month.categories.components.fijos-rows')--}}
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
