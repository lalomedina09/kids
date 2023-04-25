<div id="{{ str_slug(__('Section Exists')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container">
        <div class="row">
           @include('partials.profiles.components.tools.components.budget.view-month.header')
        </div>

        @include('partials.profiles.components.tools.components.budget.view-month.sub-header-btns')

    </div>

    <div class="" style="background-color: #eee;">
        @include('partials.profiles.components.tools.components.budget.view-month.categories.fijos')

        @include('partials.profiles.components.tools.components.budget.view-month.categories.gustos')

        @include('partials.profiles.components.tools.components.budget.view-month.categories.ahorros')
    </div>

</div>
