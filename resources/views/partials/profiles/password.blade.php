<div id="{{ str_slug(__('Update password')) }}" class="tab-pane">

    @include('partials.profiles.components.btn-profile')
    <hr>

    <h5 class="text-danger text-uppercase custom-f-s-small mb-5">@lang('Update password')</h5>
    <form action="{{ route('profile.update', ['password']) }}" method="POST"
        id="form-password" class="form-custom">
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="password" class="control-label text-uppercase custom-f-s-small">* @lang('New password')</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="password-confirmation" class="control-label text-uppercase custom-f-s-small">* @lang('Repeat new password')</label>
                    <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox mt-1">
                <label class="text-uppercase custom-f-s-small">
                    <input type="checkbox" id="toggle-password" > @lang('View password')
                    <span class="custom-control-indicator"></span>
                </label>
            </div>
        </div>

        <p class="small font-italic custom-f-s-small">
            (*) @lang('The field is required')
        </p>

        <div class="form control text-center">
            <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill custom-f-s-small">
        </div>
    </form>
</div>
