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
