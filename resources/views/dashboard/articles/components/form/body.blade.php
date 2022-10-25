<div class="col-md-8">
    <div class="form-group">
        <label for="title" class="form-label">Título del artículo:</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título del Artículo'] ) !!}
    </div>

    <div class="form-group">
        <label for="body" class="form-label">Contenido del artículo:</label>
        {!! Form::textarea('body', null, ['class' => 'form-control wysiwyg', 'rows' => 40] ) !!}
    </div>

    <div class="form-group">
        <label for="excerpt" class="form-label">Extracto del artículo:</label>
        {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 5, 'data-label' => 'letters', 'data-limit' => 156] ) !!}
    </div>

    <!--<div class="row">
        <div class="col-md-8">

        </div>
    </div>-->
    <div class="card mt-5">
        <div class="card-header">
            Sitio en el que estará disponible el articulo <!--|  Código Post de Instagram para mostar imagen-->
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="form-label">Elige el sitio origen:</label>
                        <select class="form-control" name="site" required="required">
                            <!--<option value="" {{ ($article->site === "") ? 'selected="selected"' : '' }}>Elige el sitio</option>-->
                            <option value="queridodinero.com" {{ ($article->site === "queridodinero.com") ? 'selected="selected"' : '' }}>queridodinero.com</option>
                            <option value="dear-money.com" {{ ($article->site === "dear-money.com") ? 'selected="selected"' : '' }}>dear-money.com</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="display: none">
                        <label for="code_instagram" class="form-label">Código de Instagram:</label>
                        {!! Form::text('code_instagram', null, ['class' => 'form-control', 'placeholder' => 'Código del post'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


