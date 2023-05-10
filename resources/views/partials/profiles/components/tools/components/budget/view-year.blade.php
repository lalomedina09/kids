<div id="{{ str_slug(__('Section View Year')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container" id="budget-section-year-header">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_header')
    </div>

    <div class="" style="background-color: #eee;" id="budget-section-year">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body')
    </div>

</div>
