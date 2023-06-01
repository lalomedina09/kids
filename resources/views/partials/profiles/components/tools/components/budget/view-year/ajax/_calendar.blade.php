<div class="mt-1">
        <br>
        <div class="div-scroll-calendar row">
        @foreach ($buildCardsMonth as $_month)
            {{-- dd($_month) --}}
            <div id="budgetSectionYearLoading" style="display:none">
                <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
            </div>
            @include('partials.profiles.components.tools.components.budget.view-year.calendar._card')

        @endforeach
    </div>
</div>

