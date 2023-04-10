<div id="{{ str_slug(__('Other Actions')) }}" class="tab-pane">
    <h5 class="text-danger text-uppercase mb-5">@lang('Delete Account')</h5>

	<p>Para eliminar tu cuenta debes de saber tu contraseña de acceso.</p>
	<p>Tu cuenta pasar&aacute; a estado "Borrado" antes de ser eliminada permanentemente en los siguientes 10 d&iacute;as de manera autom&aacute;tica; esto para evitar borrados accidentales o si existe un cambio de opini&oacute;n.</p>
	
    <form action="{{ route('profile.destroy') }}" method="POST"
        id="form-delete" class="form-custom">
		@csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="password" class="control-label text-uppercase">* @lang('Password')</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="password-confirmation" class="control-label text-uppercase">* @lang('Repeat password')</label>
                    <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
                </div>
            </div>
        </div>

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        <div class="form control text-center">
            <input type="submit" value="@lang('Confirm deletion')" class="btn btn-danger btn-pill">
        </div>
    </form>
</div>
