<p class="text-danger text-uppercase text-center mb-0">
    Casi terminamos
</p>
<p class="modal__title text-uppercase text-center mb-5">
    Es importante que agregues tus datos bancarios para recepción de pagos
</p>

<div id="register-wrapper">
    <div id="register-form">
            <form action="{{ route('register.store.bank', [$user_id, 'banking']) }}" class="form-custom form-modal" method="post" id="form-register">
                @method('patch')
                @csrf
            <div id="register-general">
                <div>
                    <!---------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    @csrf

                    <div class="form-row mb-3">
                        <div class="form-group col-12">
                            <label for="user-clabe" class="control-label">* @lang('CLABE')</label>
                            <input type="number" name="clabe"
                                id="user-clabe" class="form-control"
                                placeholder="@lang('e.g.') 002115016003269411"
                                data-label="numbers" data-limit="18">

                            @if ($errors->has('clabe'))
                                <span class="small text-danger">{{ $errors->first('clabe') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-bank" class="control-label">@lang('Bank')</label>
                            <input type="text" name="name_bank" id="user-bank" class="form-control">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-account" class="control-label">@lang('Account')</label>
                            <input type="text" name="account" id="user-account" class="form-control">
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-name" class="control-label">* @lang('Business name')</label>
                            <input type="text" name="tax_name"
                                id="user-tax-name" class="form-control">

                            @if ($errors->has('tax_name'))
                                <span class="small text-danger">{{ $errors->first('tax_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-number" class="control-label">* @lang('Taxpayer identification number')</label>
                            <input type="text" name="tax_number"
                                id="user-tax-number" class="form-control" data-label="numbers" data-limit="13">

                            @if ($errors->has('tax_number'))
                                <span class="small text-danger">{{ $errors->first('tax_number') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-address" class="control-label">* @lang('Street')</label>
                            <input type="text" name="tax_address"
                                id="user-tax-address" class="form-control">

                            @if ($errors->has('tax_address'))
                                <span class="small text-danger">{{ $errors->first('tax_address') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-address-number" class="control-label">* @lang('Number')</label>
                            <input type="number" name="tax_address_number"
                                id="user-tax-address-number" class="form-control">

                            @if ($errors->has('tax_address_number'))
                                <span class="small text-danger">{{ $errors->first('tax_address_number') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-zipcode" class="control-label">* @lang('Zip code')</label>
                            <input type="number" name="tax_zipcode"
                                id="user-tax-zipcode" class="form-control"
                                data-label="numbers" data-limit="5">

                            @if ($errors->has('tax_zipcode'))
                                <span class="small text-danger">{{ $errors->first('tax_zipcode') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label for="user-tax-settlements" class="control-label">* @lang('Settlement')</label>
                            <!--<input type="text" id="tax_settlement" name="tax_settlement" class="form-control">-->
                            <select name="tax_settlement"
                                id="user-tax-settlements" class="form-control" >
                            </select>

                            @if ($errors->has('tax_settlement'))
                                <span class="small text-danger">{{ $errors->first('tax_settlement') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label class="control-label">@lang('Municipality')</label>
                            <input type="text" id="user-tax-municipality" class="form-control">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
                            <label class="control-label">@lang('State')</label>
                            <input type="text" id="user-tax-state" class="form-control">
                        </div>

                    </div>

                    <p class="small font-italic">
                        (*) @lang('The field is required')
                    </p>

                    <!----------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger btn-pill">@lang('Save')</button>
                    </div>
                    <div class="form-group text-right">
                        <h2 class="text-green">
                            3 / 3
                        </h2>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--<div class="text-center">
        <p class="text-white text-xsmall mb-0">Al registrarte estás aceptando nuestros</p>
            <a href="{{ route('terms') }}" target="_blank" class="text-white text-underline text-xsmall">Términos y Condiciones</a>
        </p>
    </div>-->
</div>

