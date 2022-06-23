<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="title" class="form-label">Título de la página:</label>
            {!! Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Título de la página'] ) !!}
        </div>

        <div class="form-group">
            <label for="body" class="form-label">Contenido de la página:</label>
            {!! Form::textarea('body', $page->body, ['class' => 'form-control wysiwyg', 'rows' => 40] ) !!}
        </div>
    </div>


    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                Guardar
            </div>

            <div class="card-body">
                <input class="btn btn-primary btn-block" type="submit" value="Guardar">
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Autenticación
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="auth" id="auth" class="custom-control-input" value="1" {{ ($page->auth) ? 'checked="checked"' : '' }}>
                        <label for="auth" class="custom-control-label">Se requiere iniciar sesión para ver la página</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
