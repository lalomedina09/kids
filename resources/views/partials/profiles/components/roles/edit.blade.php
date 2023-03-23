
<div class="row">
    <div class="col-md-12 text-center">
        <h5 class="text-danger text-uppercase custom-f-s-small mb-5">
            @lang('Update') @lang('Rol') <span class="text-white">{{ $companyRole->name }}</span>
        </h5>
    </div>
    <div class="col-md-12">
        {!! Form::model($companyRole, ['route' => ['profile.companyrole.update', $companyRole->id], 'method' => 'post', 'files' => true, 'id' => 'form-profile-branch']) !!}
            @method('patch')
            @csrf

            <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Rol')</label>
                    <input type="hidden" name="company_id" class="form-control" value="{{ $companyRole->company_id }}">
                    <input type="text" name="name" class="form-control" required value="{{ $companyRole->name }}"> {{-- {{ $user->name }} --}}
                    @if ($errors->has('name'))
                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="branches" class="control-label text-uppercase custom-f-s-small"
                    title="List Branches">* @lang('Branch')</label>
                    <select name="branch_id" class="form-control" required="required">

                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ ($companyRole->branch_id == $companyRole->branch_id) ? 'selected' : '' }}>
                                    {{ $branch->name }}
                            </option>
                        @endforeach

                        {{--@foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">
                                    {{ $branch->name }}
                            </option>
                        @endforeach--}}
                    </select>
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
