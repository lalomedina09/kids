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

            <div class="card mb-4">
                <div class="card-header">
                    Categorías
                </div>

                <div class="card-body">
                    @forelse($categories as $category)
                        <div class="custom-control custom-checkbox">
                            {!! Form::checkbox('categories[]', $category->id, null, ['id' => $category->slug, 'class' => 'custom-control-input']) !!}
                            <label for="{{ $category->slug }}" class="custom-control-label"> {!! $category->name !!}</label>
                        </div>
                    @empty
                        <p>No hay categorías en la base de datos.</p>
                    @endforelse
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Subcategorías (Etiquetas)
                </div>

                <div class="card-body">
                    @forelse($tags as $tag)
                        <div class="custom-control custom-checkbox">
                            {!! Form::checkbox('tags[]', $tag->id, null, ['id' => $tag->slug, 'class' => 'custom-control-input']) !!}
                            <label for="{{ $tag->slug }}" class="custom-control-label"> {!! $tag->name !!}</label>
                        </div>
                    @empty
                        <p>No hay etiquetas en la base de datos.</p>
                    @endforelse
                </div>
            </div>

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

            <div class="card mb-4">
                <div class="card-header">
                    Autor
                </div>

                <div class="card-body">
                    @can('blog.articles.publish')
                        <div class="form-group">
                            <select name="author_id"
                                id="author" class="form-control">
                                @foreach ($authors as $id => $fullname)
                                    <option value="{{ $id }}"
                                        {{ ($article->author_id == $id) ? 'selected="selected"' : '' }}>
                                        {{ $fullname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <p>{{ auth()->user()->present()->fullname }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@if (isset($update) && $update)
    @can('blog.articles.publish')
        <hr>

        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Publicar
                    </div>

                    <div class="card-body">
                        @if( isset($article) and isset($article->published_at) )
                            <p>
                                <span class="font-weight-bold">Publicado:</span> {{ $article->present()->published_at }}
                                <a href="{{ route('dashboard.articles.unpublish', [$article->id]) }}" class="btn btn-sm btn-outline-warning d-inline"
                                    data-method="delete"
                                    data-token="{{ csrf_token() }}"
                                    data-confirm="¿Estás seguro? Presiona OK para continuar">
                                    Enviar a borrador
                                </a>
                            </p>
                        @else
                            <p class="font-weight-bold">Sin publicar</p>
                        @endif

                        <hr>

                        <form action="{{ route('dashboard.articles.publish', [$article->id]) }}" method="post">
                            @csrf

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <input type="datetime" name="published_at" id="article-published_at" class="form-control datetimepicker-input" data-target="#article-published_at" data-toggle="datetimepicker">
                            </div>

                            <input class="btn btn-outline-primary btn-block" type="submit" value="Publicar con la fecha seleccionada">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Ultima Actualización
                    </div>

                    <div class="card-body">
                        <p>
                            <span class="font-weight-bold">Actualizado:</span> {{ $article->present()->updated_at }}
                        </p>
                    </div>
                </div>
                <!-- update slug -->
                <div class="card mb-4">
                    <div class="card-header">
                        Actualizar Url del articulo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.articles.updateslug', [$article->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="slug" class="form-label">
                                    Url actual:
                                    <a href="{{ route('articles.show', [$article->slug]) }}" target="_blank">
                                        {{ $article->slug }}
                                    </a>
                                </label>
                                <br><br>
                                <label for="slug" class="form-label">Nueva Url:</label>
                                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Nueva Url'] ) !!}
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endif

