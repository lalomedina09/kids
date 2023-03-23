<div class="row">
    <div class="col-md-12 text-center">
        <h5 class="text-danger text-uppercase custom-f-s-small mb-5">
            @lang('Update') @lang('Branch') <span class="text-white">{{ $branch->name }}</span>
        </h5>
    </div>
    <div class="col-md-12">
        {!! Form::model($branch, ['route' => ['profile.branch.update', $branch->id], 'method' => 'post', 'files' => true, 'id' => 'form-profile-branch']) !!}
            @method('patch')
            @csrf

            <div class="row mb-3">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="form-group">
                        <input type="hidden" name="company_id" class="form-control" value="{{ $branch->company_id }}">

                        <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Branch')</label>
                        <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
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
                <input type="submit" value="@lang('Update')" class="btn btn-danger btn-pill custom-f-s-small">
            </div>
        {!! Form::close() !!}

    </div>
</div>
