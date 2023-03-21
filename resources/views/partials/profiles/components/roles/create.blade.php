<!-- Para poder agregar un rol debe existir la empresa y al menos una sucursal--->
    <!-- Agrega o Edita los campos--->
    <h5 class="text-danger text-uppercase custom-f-s-small mt-2 mb-2">@lang('Add') @lang('Rol')</h5>

    {!! Form::open(['route' => 'profile.companyrole.store', 'method' => 'post', 'id' => 'form-profile-roles']) !!}
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Rol')</label>
                    <input type="hidden" name="company_id" class="form-control" value="{{ $company->id }}">
                    <input type="text" name="name" class="form-control" value=""> {{-- {{ $user->name }} --}}
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
                        {{--
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ ($user->getMeta('blog', 'branch') == $branch->dial_code) ? 'selected' : '' }}>
                                    {{ $branch->name }} {{ $branch->dial_code }}
                            </option>
                        @endforeach
                        --}}
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">
                                    {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <p class="small font-italic custom-f-s-small">
            (*) @lang('The field is required')
        </p>

        <div class="form-group text-center">
            <input type="submit" value="@lang('Add') @lang('New')" class="btn btn-danger btn-pill custom-f-s-small">
        </div>
    {!! Form::close() !!}
