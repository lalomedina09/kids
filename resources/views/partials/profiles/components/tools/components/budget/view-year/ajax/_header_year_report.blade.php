<div class="row">
    @include('partials.profiles.components.tools.components.budget.view-year.ajax.header._resumen_report')
</div>

<!-- Btns Menu Year-->
<div class="row mt-4">
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget custom-ml-5"
        href="#{{ str_slug(__('Section View Year')) }}"
        data-toggle="tab"
        onclick="activeBudgetSectionYear();">
            Calendario
            <img src="{{ asset('images/tools/budget/calendar-black.png') }}" width="25" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget"
            href="#{{ str_slug(__('Report Annual')) }}"
            data-toggle="tab"
            onclick="activeBudgetSectionYearReport();">
            <span class="text-color-gradient">
                Reporte
            </span>
            <img src="{{ asset('images/tools/budget/report-white.png') }}" width="25" alt="Lo que sale">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <div id="budgetSectionYearLoadingReport" style="display:none">
            <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
        </div>
    </div>
</div>

