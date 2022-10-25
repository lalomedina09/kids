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
