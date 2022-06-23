<div class="row">

    <div class="col-md-8">

        <div class="form-group">
            <label for="title" class="form-label">Texto de la cubierta:</label>
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título de la Cubierta'] ) !!}
        </div><!-- title -->

        <div class="form-group">
            <label for="url" class="form-label">Liga de la cubierta:</label>
            {!! Form::text('link', $cover->url, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: https://www.queridodinero.com'] ) !!}
        </div>

        <div class="form-group">
            <label for="position" class="form-label">Posición de la cubierta:</label>
            <ul class="list-covers">
                @foreach(range(0,6) as $position)
                    <li>
                        {!! Form::radio('position', $position, null, ['id' => $position, 'class' => 'custom-control-input']) !!}
                        <label for="{{ $position }}"> {{ $position ? $position : "Ninguna" }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <div class="col-md-4">

        <!-- Crear -->
        <div class="card mb-4">
            <div class="card-header">
                Crear
            </div><!-- .card-header -->
            <div class="card-body">
                <input class="btn btn-primary btn-block" type="submit" value="{{ $btn ?? 'Crear' }}">
            </div>
        </div><!-- .card -->

        <!-- Color -->
        <div class="card mb-4">
            <div class="card-header">
                Color
            </div><!-- .card-header -->
            <div class="card-body">
                <div class="form-group">
                    {!! Form::selectColor('color', null, ['class' => 'form-control', 'id' => 'color']) !!}
                </div>
            </div>
        </div><!-- .card -->

        <!-- Imagen Destacada -->
        <div class="card mb-4">
            <div class="card-header">
                Imagen Destacada
            </div><!-- .card-header -->
            <div class="card-body">
                <div class="image-container">
                    @if( isset($cover) AND $cover->hasMedia('featured_image') )
                        <img src="{{ asset($cover->present()->featured_image) }}" class="img-fluid" style="border: 1px solid #ddd;">
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
