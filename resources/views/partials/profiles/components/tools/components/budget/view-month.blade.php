<div id="{{ str_slug(__('Section View Month')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container" id="budget-section-month-header">
        <!-- Aqui van archivos de pre load header month---->
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_header')

    </div>

    <div class="" style="background-color: #eee;" id="budget-section-month-content">
        <!-- Aqui van archivos de pre load body month-->
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_body')
    </div>

</div>
