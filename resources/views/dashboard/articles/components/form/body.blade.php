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
</div>
