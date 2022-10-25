@push('styles')
    <link href="{{ mix('css/vendor/select.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/select.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/dashboard/articles/create.js') }}"></script>
@endpush

@if (isset($update) && $update)
    {!! Form::model($article, ['route' => ['dashboard.articles.update', $article->id], 'method' => 'post', 'files' => true, 'id' => 'form-articles']) !!}
        @method('patch')
@else
    {!! Form::open(['route' => 'dashboard.articles.store', 'method' => 'post', 'files' => true, 'id' => 'form-articles']) !!}
@endif

    <div class="row">
        @include('dashboard.articles.components.form.body')

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Guardar
                </div>

                <div class="card-body">
                    @if ($article->is_published)
                        <div class="alert alert-warning text-justify">
                            El contenido ha sido publicado y no debe ser modificado.
                            Da clic en "Enviar a borrador" al pie del formulario para editarlo.
                        </div>
                        @can('blog.articles.all')
                            <input class="btn btn-primary btn-block" type="submit" value="Modificar">
                        @endcan
                    @else
                        <div class="alert alert-warning text-justify">
                            El contenido no será publicado automáticamente, selecciona una fecha de publicación al pie del formulario para publicar.
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                    @endif
                </div>
            </div>

            @include('dashboard.articles.components.form.categories')

            <div class="card mb-4">
                <div class="card-header">
                    Imagen Destacada
                </div>

                <div class="card-body">
                    <div class="image-container">
                        @if( isset($article) AND $article->hasMedia('featured_image') )
                            <img src="{{ asset($article->present()->thumbnail) }}" class="img-fluid" style="border: 1px solid #ddd;">
                        @endif
                    </div>

                    <div class="custom-file mt-4">
                        <input type="file" class="custom-file-input" name="featured_image" id="featured_image">
                        <label class="custom-file-label" for="featured_image">Seleccionar archivo...</label>
                        <small class="form-text text-muted">Máximo 1 MB, en formato JPG, PNG y GIF</small>
                    </div>
                </div>
            </div>

            @include('dashboard.articles.components.form.autor')

            {{--@include('dashboard.articles.components.form.site')--}}
        </div>
    </div>
{!! Form::close() !!}

@if (isset($update) && $update)
    @can('blog.articles.publish')
        <hr>

        <div class="row">
            @include('dashboard.articles.components.form.publish')

            @include('dashboard.articles.components.form.url')
        </div>
    @endcan
@endif

