<div id="{{ str_slug(__('My interests')) }}" class="tab-pane">
    <h5 class="text-danger text-uppercase mb-5">@lang('My interests')</h5>

    <form action="{{ route('profile.update', ['interests']) }}" method="post"
        id="form-interests" class="form-custom">
        @csrf

        <div class="row mb-3">
            @foreach ($interests as $key => $interest)
                <div class="col-xl-3 col-lg-4 col-6 mb-2">
                    <div class="custom-control custom-checkbox">
                        <label class="text-uppercase">
                            <input type="checkbox" name="interests[]" id="interest-{{ $interest->id }}" value="{{ $interest->id }}"
                                {{ in_array($interest->id, $user_interests) ? 'checked' : ''}}>
                            <label for="interest-{{ $interest->id }}" class="form-control-label" >{{ $interest->name }}</label>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="form control text-center">
            <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill">
        </div>
    </form>
</div>
