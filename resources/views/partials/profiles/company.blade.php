<div id="{{ str_slug(__('My Company')) }}" class="tab-pane">

    <!-- Archivo para  botones dentro de la seccion-->
    @include('partials.profiles.components.btn-company')
    <hr>
    <h5 class="text-danger text-uppercase custom-f-s-small mb-5">@lang('My Company')</h5>
    <form action="{{ route('profile.update', ['profile']) }}" method="post" enctype="multipart/form-data"
        id="form-profile" class="form-custom">
        @csrf

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="name" class="control-label text-uppercase custom-f-s-small">* @lang('Name Company')</label>
                    <input type="text" name="name" class="form-control" value=""> {{-- {{ $user->name }} --}}
                    @if ($errors->has('name'))
                        <span class="small text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <!---------------- Campo para guardar el nombre publico ------------------->
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="form-group">
                    <label for="comments" class="control-label text-uppercase custom-f-s-small"
                    title="Comentarios adicionales">* @lang('Comments')</label>
                    <input type="text" name="comments" class="form-control" value="{{ $user->comments }}">
                    @if ($errors->has('comments'))
                        <span class="small text-danger">{{ $errors->first('comments') }}</span>
                    @endif
                </div>
            </div>
            <!---------------- Termina campo para guardar el nombre ------------------->
            <!-- En agosto 2022 agregamos el item de wpp -->
        </div>

        <p class="small font-italic">
            (*) @lang('The field is required')
        </p>

        <div class="form-group text-center">
            <input type="submit" value="@lang('Save changes')" class="btn btn-danger btn-pill custom-f-s-small">
        </div>
    </form>
</div>
