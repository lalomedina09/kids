<div class="row">
    <div class="col-md-3">
        <!--<h5 class="text-danger text-uppercase mb-5">@lang('General information')</h5>-->
        <a href="#{{ str_slug(__('General information')) }}"
            class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
            data-toggle="tab">@lang('General information')</a>
    </div>
    @if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
        <div class="col-md-3">
            <a href="#{{ str_slug(__('Payment')) }}"
                class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
                data-toggle="tab">@lang('Payment')</a>
        </div>
    @endif
    <!-- esto hace referencia a QD Play->
    <div class="col-md-4">
        <a href="#{{ str_slug(__('Billing Data')) }}"
            class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
            data-toggle="tab">@lang('Billing Data')</a>
    </div>
    -->

    @if ($user->hasProfileRoles() || $user->hasExhibitorRoles())
        <div class="col-md-3">
            <a href="#{{ str_slug(__('My personal profile')) }}"
                class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
                data-toggle="tab">@lang('Experence and Education')</a>
        </div>
    @endif

    <div class="col-md-3">
        <a href="#{{ str_slug(__('Update password')) }}"
            class="nav-item nav-link text-uppercase text-dark c-text-size text-center"
            data-toggle="tab">@lang('Update password')</a>
    </div>
</div>
