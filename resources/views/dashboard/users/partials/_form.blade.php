@if (isset($update) && $update)
    <form action="{{ route('dashboard.users.update', [$user->id, 'general']) }}" method="post" enctype="multipart/form-data" id="form-general">
        @method('patch')
@else
    <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
@endif

    @csrf

    <div class="form-row">
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="name" class="control-label">@lang('Name'):</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="last_name" class="control-label">@lang('Last Name'):</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>

        <!---->
        <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="name_public" class="control-label" title="Nombre para mostrar como expositor en QD Play">@lang('Name Public'):</label>
            <input type="text" name="name_public" class="form-control" value="{{ $user->name_public }}">
        </div>
        <!---->

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="email" class="control-label">@lang('E-Mail'):</label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="state" class="control-label">@lang('State'):</label>
            <select name="state" class="form-control">
                @foreach (cache()->get('states.json') as $state)
                    <option value="{{ $state->name }}" {{ ($user->getMeta('blog', 'state') == $state->name) ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="countrycode" class="control-label">@lang('Country Code'):</label>
            <select name="countrycode" class="form-control" id="user-countrycode">
                @foreach (cache()->get('countries.json') as $country)
                    <option value="{{ $country->dial_code }}" {{ ($user->getMeta('blog', 'countrycode') == $country->dial_code) ? 'selected' : '' }}>
                        {{ $country->name }} {{ $country->dial_code }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="whatsapp" class="control-label">@lang('Whatsapp'): (@lang('Ten Digits'))</label>
            <input type="text" name="whatsapp" class="form-control" placeholder="8122009944" required="required" value="{{ $user->getMeta('blog', 'whatsapp') }}">
        </div>



        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label for="user-birthdate" class="control-label">@lang('Birth Date'):</label>
            <input type="date" name="birthdate"
                id="user-birthdate" class="form-control datetimepicker-input"
                data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <label class="mb-3">Género:</label>
            <div class="form-group ">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="gender" id="gender-male" class="custom-control-input" value="male" {{ ($user->getMeta('blog', 'gender') === 'male') ? 'checked' : '' }}>
                    <label for="gender-male" class="custom-control-label">Hombre</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="gender" id="gender-female" class="custom-control-input" value="female" {{ ($user->getMeta('blog', 'gender') === 'female') ? 'checked' : '' }}>
                    <label for="gender-female" class="custom-control-label">Mujer</label>
                </div>
            </div>
        </div>

        @unless(isset($update) && $update)
            <div class="col-12">
                <hr>
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <label for="password" class="control-label">@lang('Password'):</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <label for="password-confirmation" class="control-label">@lang('Password confirmation'):</label>
                <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
            </div>
        @endunless

        <div class="col-12">
            <hr>
        </div>

        <div class="col-xl-6 col-lg-6 col-lg-6 col-sm-12 col-12">
            <label class="control-label font-weight-bold">@lang('Profile photo'):</label>
            <div class="custom-file mt-4">
                <input type="file" name="profile_photo"
                    id="profile_photo" class="custom-file-input">
                <label class="custom-file-label" for="featured_image">Seleccionar archivo...</label>
                <small class="form-text text-muted">Máximo 2 MB, en formato JPG, PNG</small>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-lg-6 col-sm-12 col-12">
            <label class="control-label font-weight-bold">@lang('Preview'):</label>
            @if ($user->hasMedia('profile_photo'))
                <div class="image-background mx-auto"
                    style="background-image: url({{ $user->present()->author_photo }});width:200px;height:200px"></div>
            @else
                <div class="alert alert-secondary">
                    @lang('No profile photo')
                </div>
            @endif
        </div>
    </div>

    <hr>

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a href="{{ ((isset($update) && $update)) ? route('dashboard.users.show', [$user->id]) : route('dashboard.users.index') }}"
            class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>
