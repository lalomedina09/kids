<div class="row mt-0">
    @foreach ($buildCardsMonth as $_month => $name)

        @include('partials.profiles.components.tools.components.budget.view-year.calendar._card')

    @endforeach


</div>
