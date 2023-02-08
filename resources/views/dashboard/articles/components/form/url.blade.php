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
                        Actualizar URL del articulo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.articles.updateslug', [$article->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="slug" class="form-label">
                                    Url actual:
                                    @isset($update)
                                        @php
                                            $site = ($article->site == "dear-money.com") ? "https://www.dear-money.com/articles/" : "https://www.queridodinero.com/articulos/" ;
                                        @endphp
                                        <a href="{{ $site . $article->slug }}" title="{{ $site . $article->slug }}" target="_blank">
                                            {{ $site . $article->slug }}
                                        </a>
                                    @endisset
                                </label>
                                <br><br>
                                <label for="slug" class="form-label">Nueva Url:</label>
                                {!! Form::text('slug', $article->slug, ['class' => 'form-control',
                                        'placeholder' => 'Nueva Url',
                                        'required' => 'required'
                                        ] )
                                !!}
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
