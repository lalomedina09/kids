<article class="box-primary">
    <div class="container">
        <div class="row">
            <div class="col-12 d-md-flex justify-content-md-between align-items-md-center education__objective">
                <h1 class="text-danger text-uppercase education__title--responsive m-0">Nuestros temas</h1>
                <div>
                    <ul class="text-white text-large education__list--objective">
                        @foreach($course->content as $content)
                            <li>{{ $content->present()->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>