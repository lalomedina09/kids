<div id="{{ str_slug(__('Report Annual')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class='notifications top-left' style="font-size: 12px;"></div>

    <div class="container" id="budget-section-year-header-report">
        @include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_header')
    </div>

    <div class="" style="background-color: #eee;" id="budget-section-year-report">
        {{--@include('partials.profiles.components.tools.components.budget.view-year.pre-load._year_body')--}}
    </div>
    <div class="row">
        <!------------------------------->
        <!--<div>
            <canvas id="layanan" width="240px" height="240px"></canvas>
        </div>

        <div>
            <canvas id="layanan_subbagian" width="240px" height="240px"></canvas>
        </div>-->
        <!------------------------------->
    </div>

</div>
