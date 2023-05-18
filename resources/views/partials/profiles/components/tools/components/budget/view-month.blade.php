<div id="{{ str_slug(__('Section View Month')) }}" class="tab-pane">

    @include('partials.profiles.components.tools.components.budget.components.header')

    <hr class="hr-gradient" style="margin-bottom: 0px;">

    <div class="container" id="budget-section-month-header">
        <!-- Aqui van archivos de pre load header month---->
        @php
            $year = \Carbon\Carbon::now()->format('Y');
            $month = \Carbon\Carbon::now()->format('m');
        @endphp
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_header')

    </div>

    <div class="" style="background-color: #eee;" id="budget-section-month-content">
        <!-- Aqui van archivos de pre load body month-->
        @include('partials.profiles.components.tools.components.budget.view-month.pre-load._month_body')
    </div>

    <!-- Modal Add Move -->
    <div class="modal fade" id="modalAddMoveBudget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-add-move" style="border-radius: 20px;">
                <div class="modal-body">
                    <div id="contentModalAddMove">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------->
</div>
