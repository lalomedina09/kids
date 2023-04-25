<div id="{{ str_slug(__('Section Entrances')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">
    <div class="container">
        <div class="row">
            <!-- Lista de meses y totales del mes -->
            @include('partials.profiles.components.tools.components.budget.view-month.header')
        </div>
    </div>

</div>
