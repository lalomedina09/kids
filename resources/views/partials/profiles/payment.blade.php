<div id="{{ str_slug(__('Payment')) }}" class="tab-pane">

    @include('partials.profiles.components.btn-profile')
    <hr>

    <h5 class="text-danger text-uppercase mb-4">@lang('Banking information')</h5>

    <form action="{{ route('profile.update', ['payment']) }}" method="post"
        id="form-payment" class="form-custom" enctype="multipart/form-data">
        @csrf

        <div class="form-row mb-3">
            <div class="form-group col-12">
                <label for="user-clabe" class="control-label text-uppercase c-text-size">* @lang('CLABE')</label>
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
                <label for="user-bank" class="control-label text-uppercase c-text-size">@lang('Bank')</label>
                <input type="text" id="user-bank" class="form-control" readonly disabled>
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-account" class="control-label text-uppercase c-text-size">@lang('Account')</label>
                <input type="text" id="user-account" class="form-control" readonly disabled>
            </div>
        </div>

        <!--- Datos Fiscales --->
        <h5 class="text-danger text-uppercase c-text-size my-4">@lang('Tax data')</h5>

        <div class="form-row mb-3">
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-name" class="control-label text-uppercase c-text-size">* @lang('Business name')</label>
                <input type="text" name="tax_name"
                    id="user-tax-name" class="form-control"
                    value="{{ $user->getMeta('blog', 'tax_name') }}">

                @if ($errors->has('tax_name'))
                    <span class="small text-danger">{{ $errors->first('tax_name') }}</span>
                @endif
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-number" class="control-label text-uppercase c-text-size">* @lang('Taxpayer identification number')</label>
                <input type="text" name="tax_number"
                    id="user-tax-number" class="form-control"
                    value="{{ $user->getMeta('blog', 'tax_number') }}">

                @if ($errors->has('tax_number'))
                    <span class="small text-danger">{{ $errors->first('tax_number') }}</span>
                @endif
            </div>
            <!------->
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-name" class="control-label text-uppercase c-text-size">* Constancía de Situación Fiscal</label>
                @if($user->getmedia('profile_file_tax')->first())
                    <a href="{{ $user->getmedia('profile_file_tax')->first()->getUrl() }}">Ver Documento</a>
                @else
                    <input type="file" name="profile_file_tax" id="profile_file_tax" accept="pdf"/>
                    <small class="form-text text-muted">Máximo 2 MB, en formato PDF</small>
                @endif

                @if ($errors->has('profile_file_tax'))
                    <span class="small text-danger">{{ $errors->first('profile_file_tax') }}</span>
                @endif
            </div>
            <!------->
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-address" class="control-label text-uppercase c-text-size">* @lang('Street')</label>
                <input type="text" name="tax_address"
                    id="user-tax-address" class="form-control"
                    value="{{ $user->getMeta('blog', 'tax_address') }}">

                @if ($errors->has('tax_address'))
                    <span class="small text-danger">{{ $errors->first('tax_address') }}</span>
                @endif
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-address-number" class="control-label text-uppercase c-text-size">* @lang('Number')</label>
                <input type="number" name="tax_address_number"
                    id="user-tax-address-number" class="form-control"
                    value="{{ $user->getMeta('blog', 'tax_address_number') }}">

                @if ($errors->has('tax_address_number'))
                    <span class="small text-danger">{{ $errors->first('tax_address_number') }}</span>
                @endif
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-zipcode" class="control-label text-uppercase c-text-size">* @lang('Zip code')</label>
                <input type="number" name="tax_zipcode"
                    id="user-tax-zipcode" class="form-control"
                    value="{{ $user->getMeta('blog', 'tax_zipcode') }}"
                    data-label="numbers" data-limit="5">

                @if ($errors->has('tax_zipcode'))
                    <span class="small text-danger">{{ $errors->first('tax_zipcode') }}</span>
                @endif
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="user-tax-settlements" class="control-label text-uppercase c-text-size">* @lang('Settlement')</label>
                <select name="tax_settlement"
                    id="user-tax-settlements" class="form-control"
                    @if($user->hasMeta('blog', 'tax_settlement')) data-selected="{{ $user->getMeta('blog', 'tax_settlement') }}" @endif></select>

                @if ($errors->has('tax_settlement'))
                    <span class="small text-danger">{{ $errors->first('tax_settlement') }}</span>
                @endif
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label class="control-label text-uppercase c-text-size">@lang('Municipality')</label>
                <input type="text" id="user-tax-municipality" class="form-control" readonly disabled>
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label class="control-label text-uppercase c-text-size">@lang('State')</label>
                <input type="text" id="user-tax-state" class="form-control" readonly disabled>
            </div>

            <p class="small font-italic w-100">
                (*) @lang('The field is required')
            </p>

            <div class="form-group col-12 text-center">
                <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill">
            </div>
        </div>
    </form>

    @if($user->getmedia('profile_file_tax')->first())
        <hr>
        <h5 class="text-danger text-uppercase c-text-size mb-4">Actualiza tu constancia de situacion fiscal</h5>
        <form action="{{ route('update.situation.tax', [$user]) }}"
                method="post" id="form-register" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                <label for="profile_file_tax" class="text-dark control-label">Subir constancia</label>
                <input type="file" name="profile_file_tax" id="profile_file_tax" accept="pdf"/>
                <small class="form-text text-muted">Máximo 2 MB, en formato PDF</small>

                @if ($errors->has('profile_file_tax'))
                    <span class="small text-danger">{{ $errors->first('profile_file_tax') }}</span>
                @endif
            </div>

            <div class="form-group col-12 text-center">
                <input type="submit" value="@lang('Actualizar')" class="btn btn-danger btn-pill">
            </div>
        </form>
    @endif
</div>
