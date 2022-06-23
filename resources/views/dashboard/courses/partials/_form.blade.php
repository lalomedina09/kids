@push('scripts')
    <script type="text/javascript" src="{{ mix('js/dashboard/courses/create.js') }}"></script>
@endpush

@if (isset($update) && $update)
    {!! Form::model($course, ['route' => ['dashboard.courses.update', $course->id], 'method' => 'POST', 'files' => true, 'id' => 'form-courses']) !!}
    @method('patch')
@else
    {!! Form::open(['route' => 'dashboard.courses.store', 'method' => 'POST', 'files' => true, 'id' => 'form-courses']) !!}
@endif

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="title" class="form-label">Título del curso:</label>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título del curso'] ) !!}
            </div>

            <div class="form-group">
                <label for="subtitle" class="form-label">Subtítulo del curso:</label>
                {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Subtítulo del curso'] ) !!}
            </div>

            <div class="form-group">
                <label for="body" class="form-label">Contenido del curso:</label>
                {!! Form::textarea('body', null, ['class' => 'form-control wysiwyg', 'rows' => 40] ) !!}
            </div>

            <div class="form-group">
                <label for="excerpt" class="form-label">Extracto del curso:</label>
                {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 5, 'data-label' => 'letters', 'data-limit' => 156] ) !!}
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span>Expositores</span>
                        </div>

                        <div class="card-body">
                            @if(isset($course->published_at))
                                <speakers :speakers="{{ $course->speakers }}" :orators="{{ $speakers }}" :course_id="{{ $course->id }}"/>
                            @else
                                <ul>
                                    <li>Podrá agregar despues de guardar.</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span>Temas del curso</span>
                        </div>

                        <div class="card-body">
                            @if(isset($course->published_at))
                                <contents :contents="{{ $contents }}" :course_id="{{ $course->id }}"/>
                            @else
                                <ul>
                                    <li>Podrá agregar despues de guardar.</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span>Itinerario</span>
                        </div>

                        <div class="card-body">
                            @if(isset($course->published_at))
                                <itineraries :itineraries="{{ $course->itineraries }}" :course_id="{{ $course->id }}"/>
                            @else
                                <ul>
                                    <li>Podrá agregar despues de guardar.</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span>¿Qué incluye?</span>
                        </div>

                        <div class="card-body">
                            @if(isset($course->published_at))
                                <extras :extras="{{ $extras }}" :course_id="{{ $course->id }}"/>
                            @else
                                <ul>
                                    <li>Podrá agregar despues de guardar.</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span>Contactos</span>
                        </div>

                        <div class="card-body">
                            @if(isset($course->published_at))
                                <contacts :contacts="{{ $contacts }}" :course_id="{{ $course->id }}"></contacts>
                            @else
                                <ul>
                                    <li>Podrá agregar contactos despues de guardar.</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Guardar
                </div>

                <div class="card-body">
                    <div class="alert alert-warning">
                        El contenido no será publicado automáticamente, selecciona una fecha de publicación al pie del formulario para publicar.
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Categorías</span>
                </div>

                <div class="card-body">
                    <select class="form-control" name="category_id">
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}" {{ ($course->category_id === $category->id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                        @empty
                            <li>No hay categorías en la base de datos.</li>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Precio</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="price"
                            id="price" class="form-control"
                            min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$"
                            placeholder="@lang('e.g.') 2500.00"
                            value="{{ $course->price }}">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="online_sell"
                                id="course-online-sell" class="custom-control-input"
                                value="1" {{ ($course->online_sell) ? 'checked="checked"' : '' }}>
                            <label for="course-online-sell" class="custom-control-label">Habilitar venta en línea</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Identificador del seminario web</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('webinar_id', null, ['class' => 'form-control', 'placeholder' => 'Webinar ID'] ) !!}
                        <small>Ejemplo:
                            <ul>
                                <li><i>80020001000</i></li>
                            </ul>
                        </small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Código de acceso del seminario web</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('webinar_password', null, ['class' => 'form-control', 'placeholder' => 'Webinar access code'] ) !!}
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>URL para registro en línea</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('enrollment_url', null, ['class' => 'form-control', 'placeholder' => 'URL para registro en línea'] ) !!}
                        <small>Ejemplos:
                            <ul>
                                <li><i>https://us02web.zoom.us/webinar/register/WN_BxzIIWSXRFy_feKKwqRACx</i></li>
                                <li><i>https://my.demio.com/ref/0MfjGYwleNIZcArR</i></li>
                                <li><i>https://taller-finanza-19-01-19-09-00.boletia.com</i></li>
                            </ul>
                        </small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Inicio del Evento</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::datetime('start_event', null, ['id' => 'course-start-date', 'class' => 'form-control datetimepicker-input', 'placeholder' => 'Fecha y Hora del Evento', 'data-target' => '#course-start-date', 'data-toggle' => 'datetimepicker']) !!}
                        <small>Ejemplo: 02/21/2015 9:22 PM</small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Fin del Evento</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::datetime('end_event', null, ['id' => 'course-end-date', 'class' => 'form-control datetimepicker-input', 'placeholder' => 'Fecha y Hora del Evento', 'data-target' => '#course-end-date', 'data-toggle' => 'datetimepicker']) !!}
                        <small>Ejemplo: 02/21/2015 9:22 PM</small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Ciudad</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Ciudad'] ) !!}
                        <small>&nbsp; Ejemplos: <i>Querétaro</i></small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Lugar del Evento</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('venue', null, ['class' => 'form-control', 'placeholder' => 'Lugar de evento'] ) !!}
                        <small>&nbsp; Ejemplos: <i>Auditorio nacional</i></small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Dirección del lugar</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Lugar de evento'] ) !!}
                        <small>&nbsp; Ejemplos: <i>Paseo de la Reforma 50, Miguel Hidalgo, 11580</i></small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Carrusel</span>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="featured" id="course-featured" class="custom-control-input" value="1" {{ ($course->featured) ? 'checked="checked"' : '' }}>
                            <label for="course-featured" class="custom-control-label">Destacar curso en carrusel</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Imagen de portada</span>
                </div>

                <div class="card-body">
                    <div class="image-container">
                        @if( isset($course) AND $course->hasMedia('featured_image') )
                            <img src="{{ $course->present()->featured_image }}" class="img-fluid" style="border: 1px solid #ddd;">
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
                    <span>Imagen del carrusel</span>
                </div>

                <div class="card-body">
                    <div class="image-container">
                        @if( isset($course) AND $course->hasMedia('slider_image') )
                            <img src="{{ $course->present()->slider_image }}" class="img-fluid" style="border: 1px solid #ddd;">
                        @endif
                    </div>

                    <div class="custom-file mt-4">
                        <input type="file" class="custom-file-input" name="slider_image" id="slider_image">
                        <label class="custom-file-label" for="slider_image">Seleccionar archivo...</label>
                        <small class="form-text text-muted">Máximo 1 MB, en formato JPG, PNG y GIF</small>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span>Imagen miniatura</span>
                </div>

                <div class="card-body">
                    <div class="image-container">
                        @if( isset($course) AND $course->hasMedia('thumbnail_image') )
                            <img src="{{ $course->present()->thumbnail_image }}" class="img-fluid" style="border: 1px solid #ddd;">
                        @endif
                    </div>

                    <div class="custom-file mt-4">
                        <input type="file" class="custom-file-input" name="thumbnail_image" id="thumbnail_image">
                        <label class="custom-file-label" for="thumbnail_image">Seleccionar archivo...</label>
                        <small class="form-text text-muted">Máximo 1 MB, en formato JPG, PNG y GIF</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

<hr>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
        <div class="card mb-4">
            <div class="card-header">
                Publicar
            </div>

            <div class="card-body">
                @if( isset($course) and isset($course->published_at) )
                    <p>
                        <span class="font-weight-bold">Publicado:</span> {{ $course->present()->published_at }}
                        <a href="{{ route('dashboard.courses.unpublish', [$course->id]) }}" class="btn btn-sm btn-outline-warning d-inline"
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

                <form action="{{ route('dashboard.courses.publish', [$course->id]) }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                        <input type="datetime" name="published_at" id="course-published_at" class="form-control datetimepicker-input" data-target="#course-published_at" data-toggle="datetimepicker">
                    </div>

                    <input class="btn btn-outline-primary btn-block" type="submit" value="Publicar con la fecha seleccionada">
                </form>
            </div>
        </div>
    </div>
</div>
