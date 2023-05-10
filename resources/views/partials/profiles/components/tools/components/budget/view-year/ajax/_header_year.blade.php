<div class="row">
    @include('partials.profiles.components.tools.components.budget.view-year.ajax.header._resumen')
</div>

<!-- Btns Menu Year-->
<div class="row mt-4">
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget custom-ml-5" href="#{{ str_slug(__('Calendar Budget')) }}" data-toggle="tab">
            Calendario
            <img src="{{ asset('images/tools/budget/calendar-black.png') }}" width="25" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget" href="#{{ str_slug(__('Report Annual')) }}" data-toggle="tab">
            <span class="text-color-gradient">
                Reporte
            </span>
            <img src="{{ asset('images/tools/budget/report-white.png') }}" width="25" alt="Lo que sale">
        </a>
    </div>
</div>

