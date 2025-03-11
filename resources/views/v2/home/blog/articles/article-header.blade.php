<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                {{--<img src="{{ $article->present()->featured_image }}" alt="{{ $article->present()->title }}"
                    class="single-featured__image" width="100%">--}}
            </div>
        </div>
        <section class="single px-lg-5">


            <article class="single__wrapper">
                <div class="pos-rel">
                    <ul class="list-unstyled single__social">
                        @if ($article->author->hasMeta('blog', 'facebook'))
                        <li class="single__social-item">
                            <a href="{{ $article->author->getMeta('blog', 'facebook') }}" class="text-danger" target="_blank"
                                rel="noopener noreferrer">
                                <!--<span class="fa fa-2x fa-facebook"></span>-->
                                <i class="lni lni-facebook-original" style="font-size: 2em"></i>
                            </a>
                        </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'twitter'))
                        <li class="single__social-item">
                            <a href="{{ $article->author->getMeta('blog', 'twitter') }}" class="text-danger" target="_blank"
                                rel="noopener noreferrer">
                                <span class="fa fa-2x fa-twitter"></span>
                            </a>
                        </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'instagram'))
                        <li class="single__social-item">
                            <a href="{{ $article->author->getMeta('blog', 'instagram') }}" class="text-danger" target="_blank"
                                rel="noopener noreferrer">
                                <!--<span class="fa fa-2x fa-instagram"></span>-->
                                <i class="lni lni-instagram-filled" style="font-size: 2em"></i>
                            </a>
                        </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'tiktok'))
                        <li class="single__social-item">
                            <a href="{{ $article->author->getMeta('blog', 'tiktok') }}" class="text-danger" target="_blank"
                                rel="noopener noreferrer">
                                <i class="lni fa-2x lni-tiktok" style="font-size: 2em"></i>
                            </a>
                        </li>
                        @endif
                        @if ($article->author->hasMeta('blog', 'youtube'))
                        <li class="single__social-item">
                            <a href="{{ $article->author->getMeta('blog', 'youtube') }}" class="text-danger" target="_blank"
                                rel="noopener noreferrer">
                                <span class="fa fa-2x fa-youtube-play"></span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="single__featured">
                    
                    <!-- Seccion  para la publicidad -->
                    @if($advertisingStatus)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ $article->advertising->link }}" target="_blank">
                                <!-- Imagen para escritorio (visible solo en pantallas md o más grandes) -->
                                <img src="{{ asset('storage/' . $article->advertising->cover_desktop) }}"
                                    alt="Imagen para escritorios" id="cover_desktop" class="d-none d-md-block"
                                    style="width: 100%;" />

                                <!-- Imagen para móvil (visible solo en pantallas sm o más pequeñas) -->
                                <img src="{{ asset('storage/' . $article->advertising->cover_movil) }}" alt="Imagen para movil"
                                    id="cover_movil" class="d-block d-md-none" style="width: 100%;" />
                            </a>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="single__content mt-4">
                    {!! $article->present()->body !!}
                </div>

                @unless($article->tags->isEmpty())
                <div class="single-tags">
                    <h6 class="single-tags__headline">Etiquetas:</h6>
                    @foreach($article->tags as $tag)
                    <a href="{{ route('articles.tags.index', $tag) }}" class="single-tags__item">{{ $tag->present()->name }}</a>
                    @endforeach
                </div>
                @endunless
            </article>
        </section>

        <section>
            @if ($article->id == 1375)
            @include('games._calendar-adviento')
            @endif
        </section>
    </div>
</section>
