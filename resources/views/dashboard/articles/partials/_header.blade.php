<div class="row mb-5">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
        <h3>{{ $subtitle ?? '' }}</h3>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
        <div class="btn-group float-right">
            @isset($link)
                @php
                    $site = ($article->site == "dear-money.com") ? "https://www.dear-money.com/articles/" : "https://www.queridodinero.com/articulos/" ;
                @endphp
                {{--<a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary">--}}
                <a href="{{ $site . $article->slug }}" title="{{ $site . $article->slug }}" class="btn btn-outline-primary" target="_blank">
                    <span class="fa fa-arrow-right"></span> Ir al artículo
                </a>
            @endisset
            <a href="{{ route('dashboard.social-post.index') }}" class="btn btn-outline-primary">
                <span class="fa fa-plus"></span> Post Instagram
            </a>
            <a href="{{ route('dashboard.articles.create') }}" class="btn btn-outline-primary">
                <span class="fa fa-plus"></span> Nuevo
            </a>
            <a href="{{ route('dashboard.articles.trashed') }}" class="btn btn-outline-primary">
                <span class="fa fa-trash"></span> Papelera
            </a>
        </div>
    </div>
</div>
