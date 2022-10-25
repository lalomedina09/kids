@push('styles')
    <link href="{{ mix('css/vendor/select.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/vendor/select.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/dashboard/articles/create.js') }}"></script>
@endpush

@if (isset($update) && $update)
    {!! Form::model($socialPost, ['route' => ['dashboard.social-post.update', $socialPost->id], 'method' => 'post', 'files' => true, 'id' => 'form-articles']) !!}
        @method('patch')
@else
    {!! Form::open(['route' => 'dashboard.social-post.store', 'method' => 'post', 'id' => 'form-articles']) !!}
@endif

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    Datos
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Hiddden -->
                        {!! Form::hidden('red_social', "instagram", ['class' => 'form-control', 'placeholder' => 'Red Social'] ) !!}
                        {!! Form::hidden('type', "Post", ['class' => 'form-control', 'placeholder' => 'Tipo de publicación'] ) !!}
                        {!! Form::hidden('description', "Publicación de instagram", ['class' => 'form-control', 'placeholder' => 'Descripcion '] ) !!}
                        <!-- End Hidden -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site" class="form-label">Elige el sitio origen:</label>
                                <select class="form-control" name="site" required="required">
                                    <option value="queridodinero.com" {{ ($socialPost->site === "queridodinero.com") ? 'selected="selected"' : '' }}>queridodinero.com</option>
                                    <option value="dear-money.com" {{ ($socialPost->site === "dear-money.com") ? 'selected="selected"' : '' }}>dear-money.com</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code" class="form-label">Código de Post:</label>
                                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código del post'] ) !!}
                            </div>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
{!! Form::close() !!}


