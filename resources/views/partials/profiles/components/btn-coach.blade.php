<div class="row">
    @if (config()->has('money.modules.advice'))
        <div class="col-md-3">
            <a href="#{{ str_slug(__('Advices')) }}"
                class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
                data-toggle="tab"
            >@lang('Advices')</a>
        </div>

        @if ($user->hasRole('advisor'))
            <div class="col-md-3">
                <a href="#{{ str_slug(__('Advice prices')) }}"
                    class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
                    data-toggle="tab"
                >@lang('Advice prices')</a>
            </div>
            <div class="col-md-3">
                <a href="#{{ str_slug(__('Calendar & Schedule')) }}"
                    class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
                    data-toggle="tab"
                >@lang('Calendar & Schedule')</a>
            </div>
        @endif
    @endif
    <!---------------------------------->
    <!---------------------------------->
</div>
