<form action="{{ route('dashboard.users.update', [$user->id, 'banking']) }}" method="post" id="form-banking">
    @method('patch')
    @csrf

    <div class="form-row mb-3">
        <div class="form-group col-12">
            <label for="user-clabe" class="control-label">* @lang('CLABE')</label>
            <input type="number" name="clabe"
                id="user-clabe" class="form-control"
                placeholder="@lang('e.g.') 002115016003269411"
                value="{{ $user->getMeta('blog', 'clabe') }}"
                data-label="numbers" data-limit="18">

            @if ($errors->has('clabe'))
                <span class="small text-danger">{{ $errors->first('clabe') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-bank" class="control-label">@lang('Bank')</label>
            <input type="text" id="user-bank" name="user_bank" class="form-control" value="{{ $user->getMeta('blog', 'user_bank') }}">
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-account" class="control-label">@lang('Account')</label>
            <input type="text" id="user-account" name="user_account" class="form-control" value="{{ $user->getMeta('blog', 'user_account') }}">
        </div>
    </div>

    <hr>

    <div class="form-row mb-3">
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-name" class="control-label">* @lang('Business name')</label>
            <input type="text" name="tax_name"
                id="user-tax-name" class="form-control"
                value="{{ $user->getMeta('blog', 'tax_name') }}">

            @if ($errors->has('tax_name'))
                <span class="small text-danger">{{ $errors->first('tax_name') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-number" class="control-label">* @lang('Taxpayer identification number')</label>
            <input type="text" name="tax_number"
                id="user-tax-number" class="form-control"
                value="{{ $user->getMeta('blog', 'tax_number') }}">

            @if ($errors->has('tax_number'))
                <span class="small text-danger">{{ $errors->first('tax_number') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-address" class="control-label">* @lang('Street')</label>
            <input type="text" name="tax_address"
                id="user-tax-address" class="form-control"
                value="{{ $user->getMeta('blog', 'tax_address') }}">

            @if ($errors->has('tax_address'))
                <span class="small text-danger">{{ $errors->first('tax_address') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-address-number" class="control-label">* @lang('Number')</label>
            <input type="number" name="tax_address_number"
                id="user-tax-address-number" class="form-control"
                value="{{ $user->getMeta('blog', 'tax_address_number') }}">

            @if ($errors->has('tax_address_number'))
                <span class="small text-danger">{{ $errors->first('tax_address_number') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-zipcode" class="control-label">* @lang('Zip code')</label>
            <input type="number" name="tax_zipcode"
                id="user-tax-zipcode" class="form-control"
                value="{{ $user->getMeta('blog', 'tax_zipcode') }}"
                data-label="numbers" data-limit="5">

            @if ($errors->has('tax_zipcode'))
                <span class="small text-danger">{{ $errors->first('tax_zipcode') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label for="user-tax-settlements" class="control-label">* @lang('Settlement')</label>
            <select name="tax_settlement"
                id="user-tax-settlements" class="form-control"
                @if($user->hasMeta('blog', 'tax_settlement')) data-selected="{{ $user->getMeta('blog', 'tax_settlement') }}" @endif></select>

            @if ($errors->has('tax_settlement'))
                <span class="small text-danger">{{ $errors->first('tax_settlement') }}</span>
            @endif
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label class="control-label">@lang('Municipality')</label>
            <input type="text" id="user-tax-municipality" class="form-control" readonly disabled>
        </div>

        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label class="control-label">@lang('State')</label>
            <input type="text" id="user-tax-state" class="form-control" readonly disabled>
        </div>

    </div>

    <p class="small font-italic w-100">
        (*) @lang('The field is required')
    </p>

    <hr>

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Guardar">
        <a href="{{ ((isset($update) && $update)) ? route('dashboard.users.show', [$user->id]) : route('dashboard.users.index') }}"
            class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>
