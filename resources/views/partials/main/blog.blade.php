<ul class="list-unstyled list-inline education--list text-center">
    <li class="list-inline-item {{ active_class('articulos*') }}">
        <a href="{{ route('articles.index') }}" class="text-uppercase">
            <span>Artículos</span>
        </a>
    </li>

    <li class="list-inline-item {{ active_class('videos*') }}">
        <a href="{{ route('videos.index') }}" class="text-uppercase">
            <span>Videos</span>
        </a>
    </li>

    <li class="list-inline-item {{ active_class('podcasts*') }}">
        <a href="{{ route('podcasts.index') }}" class="text-uppercase">
            <span>Podcasts</span>
        </a>
    </li>

    <li class="list-inline-item {{ active_class('escritores') }}">
        <a href="{{ route('authors.index') }}" class="text-uppercase">
            <span>Escritores</span>
        </a>
    </li>
</ul>
