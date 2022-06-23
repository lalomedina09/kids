<div>
    <ul class="text-white text-large education__list--itinerary">

        @foreach($itineraries as $itinerary)
            <li>
                <div class="d-flex align-items-center">
                    <div class="w-75">
                        <h3 class="text-dark text-bold">{{ $itinerary->present()->start }} - {{ $itinerary->present()->end }}</h2>
                    </div>
                    <div class="w-75">
                        <p class="text-uppercase">{{ $itinerary->present()->name }}</p>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>
