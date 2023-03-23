
{!! Form::open(['route' => 'profile.branch.post', 'method' => 'post', 'id' => 'form-profile-branch']) !!}
    @csrf

    <div class="row mb-3">
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="form-group">
                <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Branch')</label>
                <input type="text" name="name" class="form-control" value="" required>
                <input type="hidden" name="company_id" class="form-control" value="{{ $company->id }}">
                @if ($errors->has('name'))
                    <span class="small text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
    </div>

    <p class="small font-italic custom-f-s-small">
        (*) @lang('The field is required')
    </p>

    <div class="form-group text-center">
        <input type="submit" value="@lang('Add')" class="btn btn-danger btn-pill custom-f-s-small">
    </div>
{!! Form::close() !!}
