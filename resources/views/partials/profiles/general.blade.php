<div id="{{ str_slug(__('General information')) }}" class="tab-pane active">
    <h5 class="text-danger text-uppercase mb-5">@lang('General information')</h5>

    <form action="{{ route('profile.update', ['profile']) }}" method="post" enctype="multipart/form-data"
        id="form-profile" class="form-custom">
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase">* @lang('Name')</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="last_name" class="control-label text-uppercase">* @lang('Last Name')</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                    @if ($errors->has('last_name'))
                        <span class="small text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="state" class="control-label text-uppercase">* @lang('State')</label>
                    <select name="state" class="form-control">
                        @foreach (cache()->get('states.json') as $state)
                            <option value="{{ $state->name }}" {{ ($user->getMeta('blog', 'state') == $state->name) ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <span class="small text-danger">{{ $errors->first('state') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="birthdate" class="control-label text-uppercase">@lang('Birth Date')</label>
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                    @if ($errors->has('birthdate'))
                        <span class="small text-danger">{{ $errors->first('birthdate') }}</span>
                    @endif
                </div>
            </div>
            <!-- En agosto 2022 agregamos el item de wpp -->
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="countrycode" class="control-label text-uppercase">* @lang('Country Code')</label>
                    <select name="countrycode" class="form-control" required="required">
                        @foreach (cache()->get('countries.json') as $countrycode)
                            <option value="{{ $countrycode->dial_code }}" {{ ($user->getMeta('blog', 'countrycode') == $countrycode->dial_code) ? 'selected' : '' }}>
                                 {{ $countrycode->name }} {{ $countrycode->dial_code }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('countrycode'))
                        <span class="small text-danger">{{ $errors->first('countrycode') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="whatsapp" class="control-label text-uppercase">* @lang('Whatsapp')</label>
                    <input type="text" name="whatsapp"
                        id="user-whatsapp" class="form-control" data-target="#user-whatsapp" value="{{ $user->getMeta('blog', 'whatsapp') }}">
                    @if ($errors->has('whatsapp'))
                        <span class="small text-danger">{{ $errors->first('whatsapp') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <label for="gender" class="text-uppercase mb-3">* @lang('Gender')</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <label>
                            <span class="custom-control-description">@lang('Male')</span>
                            <input type="radio" name="gender" value="male" {{ ($user->getMeta('blog', 'gender') === 'male' ) ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <label>
                            <span class="custom-control-description">@lang('Female')</span>
                            <input type="radio" name="gender" value="female" {{ ($user->getMeta('blog', 'gender') === 'female' ) ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="profile_photo_checked" id="profile_photo_checked" />

            <div class="col-xl-6 col-lg-6 col-12">
				<div class="form-group text-center">
                    <!--<label for="profile_photo" class="btn btn-sm btn-danger btn-pill">@lang('Change profile photo')</label>-->
					<a href="#{{ str_slug(__('Change profile photo')) }}"
                                class="btn btn-sm btn-danger btn-pill d-block"
                                data-toggle="tab"
                            >@lang('Change profile photo')</a>
                    <input type="file" name="profile_photo" id="profile_photo" hidden="true" accept="image/png, image/jpeg" />
                </div>
            </div>
        </div>

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        <div class="form-group text-center">
            <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill">
        </div>
    </form>
</div>
