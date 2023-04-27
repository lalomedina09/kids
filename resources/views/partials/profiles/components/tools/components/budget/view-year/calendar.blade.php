<div id="{{ str_slug(__('Calendar Budget')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container">
        <div class="row">
           @include('partials.profiles.components.tools.components.budget.view-year.header')
        </div>

        @include('partials.profiles.components.tools.components.budget.view-year.sub-header-btns')
    </div>

    <div class="" style="background-color: #eee;">
        @include('partials.profiles.components.tools.components.budget.view-year.calendar.section')
    </div>

</div>
