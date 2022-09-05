<article class="py-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="education__title education__title--bottom education__title--danger education__title--responsive text-uppercase text-bold text-center mb-5">Conoce a tus expositores</h1>
            </div>
        </div>
        <div class="row">

            @include('partials.courses.speakers', ['speakers' => $course->speakers])

        </div>
    </div>
</article>