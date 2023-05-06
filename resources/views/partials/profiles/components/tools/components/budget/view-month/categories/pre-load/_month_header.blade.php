<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-7">
                @include('partials.profiles.components.tools.components.budget.view-month.components._months')
            </div>
            <div class="col-md-5">
                @include('partials.profiles.components.tools.components.budget.view-month.components._years')
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="row header-bg-gradient" id="header-level-month">
            <div class="col-md-3">
            <p class="small text-white text-bold mt-2" style="font-size: 1.1rem;">Resumen del mes</p>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que entra</span>
                    <br>
                    <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                        alt="Loading 3"
                        width="20"
                        style="display: block; margin-left: 35%;
                    ">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que sale</span>
                    <br>
                    <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                        alt="Loading 3"
                        width="20"
                        style="display: block; margin-left: 35%;
                    ">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Total</span>
                    <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                        alt="Loading 3"
                        width="20"
                        style="display: block; margin-left: 35%;
                    ">
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<!------------>
<div class="row mt-4">
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget custom-ml-5" href="#{{ str_slug(__('Section Entrances')) }}" data-toggle="tab">
            Lo que entra
            <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget" href="#{{ str_slug(__('Section Exists')) }}" data-toggle="tab">
            <span class="text-color-gradient"> Lo que sale </span>
            <img src="{{ asset('images/tools/budget/out-white.png') }}" width="30" alt="Lo que sale">
        </a>
    </div>
    <div class="col-md-4 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget" href="#{{ str_slug(__('Section Movements')) }}" data-toggle="tab">
            Movimientos <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
        </a>
    </div>
</div>
