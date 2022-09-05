@unless($course->itineraries->isEmpty())
    <article class="box-danger box-border-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 d-md-flex justify-content-md-between align-items-md-center education__schedule">
                    <h1 class="text-primary text-uppercase education__title--responsive text-bold m-0">Itinerario del día</h1>

                    @include('partials.courses.itineraries', ['itineraries' => $course->itineraries])

                </div>
            </div>
        </div>
    </article>
@endunless