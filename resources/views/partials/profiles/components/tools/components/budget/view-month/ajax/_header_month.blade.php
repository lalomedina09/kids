<div class="row">
    @include('partials.profiles.components.tools.components.budget.view-month.header')
</div>
{{--
@include('partials.profiles.components.tools.components.budget.view-month.sub-header-btns')
--}}
<div class="row mt-4" id="budget-section-month-btns">
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget custom-ml-5"
            href="#"
            onclick="activeBudgetSectionMonthMenu('entrances');">
            <span class="text-color-gradient"> Lo que entra </span>
            <img src="{{ asset('images/tools/budget/enter-white.png') }}" width="30" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget"
            href="#"
            onclick="activeBudgetSectionMonthMenu('exits');">
            Lo que sale
            <img src="{{ asset('images/tools/budget/out-white.png') }}" width="30" alt="Lo que sale">
        </a>
    </div>
    <div class="col-md-4 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget"
            href="#"
            onclick="activeBudgetSectionMonthMenu('movements');">
            Movimientos
            <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
        </a>
    </div>
    <div class="col-md-4 text-left">
        <div id="budgetSectionMonthBtnsLoading" style="display:none">
            <img src="{{ asset('images/gif/loading/circle-black.gif') }}" alt="Loading 4" width="50">
        </div>
    </div>
</div>

