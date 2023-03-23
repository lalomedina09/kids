@if (!is_null($company))
        {!! Form::model($company, ['route' => ['profile.company.update', $company->id], 'method' => 'post', 'files' => true, 'id' => 'form-profile-company']) !!}
            @method('patch')
    @else
        {!! Form::open(['route' => 'profile.company.post', 'method' => 'post', 'id' => 'form-profile-company']) !!}
    @endif
        @csrf
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Company')</label>
                    <input type="text" name="name" required class="form-control" value="@if(!is_null($company)){{ $company->name }}@endif">
                    @if ($errors->has('name'))
                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="comments" class="control-label text-uppercase custom-f-s-small"
                    title="Comentarios adicionales"> @lang('Comments')</label>
                    <input type="text" name="comments" class="form-control" value="@if(!is_null($company)){{ $company->comments }}@endif">
                    @if ($errors->has('comments'))
                        <span class="small text-danger">{{ $errors->first('comments') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        <div class="form-group text-center">
            @if(!is_null($company))
                <input type="submit" value="@lang('Update')" class="btn btn-danger btn-pill custom-f-s-small">
            @else
                <input type="submit" value="@lang('Add')" class="btn btn-danger btn-pill custom-f-s-small">
            @endif
        </div>
    {!! Form::close() !!}
