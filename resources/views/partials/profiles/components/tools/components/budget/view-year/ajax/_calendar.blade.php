<div class="mt-1">
        <br>
        <div class="div-scroll-calendar row">
        @foreach ($buildCardsMonth as $_month)
            {{-- dd($_month) --}}
            @include('partials.profiles.components.tools.components.budget.view-year.calendar._card')

        @endforeach
    </div>
</div>

