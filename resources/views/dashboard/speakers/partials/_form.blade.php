<div class="row">

    <div class="col-md-8">

        <div class="form-group">
            <label for="name" class="form-label">Nombre del video:</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del expositor'] ) !!}
        </div>

         <div class="form-group">
             <label for="profession" class="form-label">Profesión:</label>
            {!! Form::text('profession', null, ['class' => 'form-control', 'placeholder' => 'Profesión'] ) !!}
        </div>

        <div class="form-group">
            <label for="job" class="form-label">Empleo:</label>
            {!! Form::textarea('job', null, ['class' => 'form-control wysiwyg', 'rows' => 10] ) !!}
        </div>

        <div class="form-group">
            <label for="bio" class="form-label">Biografía:</label>
            {!! Form::textarea('bio', null, ['class' => 'form-control wysiwyg', 'rows' => 10] ) !!}
        </div>
    </div>


    <div class="col-md-4">

        <!-- Publicar -->
        <div class="card mb-4">
            <div class="card-header">
                Publicar
            </div><!-- .card-header -->
            <div class="card-body">
                <input class="btn btn-primary btn-block" type="submit" value="{{ $btn ?? 'Publicar' }}">
            </div>
        </div><!-- .card -->

        <!-- Imagen Destacada -->
        <div class="card mb-4">
            <div class="card-header">
                Imagen Destacada
            </div><!-- .card-header -->
            <div class="card-body">
                <div class="image-container">
                    @if( isset($speaker) AND $speaker->hasMedia('featured_image') )
                        <img src="{{ asset($speaker->present()->featured_image) }}" class="img-fluid" style="border: 1px solid #ddd;">
                    @endif
                </div>
                <div class="custom-file mt-4">
                    <input type="file" class="custom-file-input" name="featured_image" id="featured_image">
                    <label class="custom-file-label" for="featured_image">Seleccionar archivo...</label>
                </div>
                <div class="mt-3">
                    <small>Máximo 1 MB, en formato JPG, PNG y GIF</small>
                </div><!-- .mt-3 -->
            </div>
        </div><!-- .card -->

    </div><!-- .col-md-4 -->

</div><!-- .row -->
