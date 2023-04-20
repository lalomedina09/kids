<div class="col-md-12 mt-4">
    <div class="row">
        <a class="btn-white-tool-budget btn-radius-tool-budget">
            Lo que entra <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
        </a>
        <a class="btn-dark-tool-budget btn-radius-tool-budget">
            Lo que sale <img src="{{ asset('images/tools/budget/out-white.png') }}" width="30" alt="Lo que sale">
        </a>
        <a class="btn-white-tool-budget btn-radius-tool-budget">
            Movimientos <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
        </a>
    </div>
</div>
<div class="row" style="background-color: #eeeeee">
    @include('partials.profiles.components.tools.components.budget.view-month.categories.fijos')

    @include('partials.profiles.components.tools.components.budget.view-month.categories.gustos')

    @include('partials.profiles.components.tools.components.budget.view-month.categories.ahorros')
</div>
