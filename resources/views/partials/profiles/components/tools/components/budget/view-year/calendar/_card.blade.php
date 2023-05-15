<div class="col-md-4">
    <div class="calendar-card-month">
        <div class="row mb-1">
            <div class="col-md-12 text-center mt-3">
                <div class="row">
                    <div class="col-md-10">
                        <span style="text-transform: uppercase;">Enero</span>
                    </div>
                    <div class="col-md-2 text-left">
                        <a href="#" onclick="openModalBudgetZoom('entrances');">
                            <img src="{{ asset('images/tools/budget/zoom-in.png') }}" width="30" alt="Zoom">
                        </a>
                    </div>
                </div>
                <br>
                <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
                <span style="font-weight:700; font-size: 1.3rem;">Lo que entra</span>
                <br><br>
                @include('partials.profiles.components.tools.components.budget.view-year.calendar._card-enter')

                <br>
                <img src="{{ asset('images/tools/budget/out-black.png') }}" width="30" alt="Lo que sale">
                <span style="font-weight:700; font-size: 1.3rem;">Lo que sale</span>
                <br><br>
                @include('partials.profiles.components.tools.components.budget.view-year.calendar._card-out')
                <br>
                @include('partials.profiles.components.tools.components.budget.view-year.calendar._categories')
                <br>
                <div class="mb-3">
                    <a href="#" onclick="openModalMoves('entrances');">
                        <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
                        <span style="font-weight:700; font-size: 1.3rem;">Movimientos</span>
                        <img src="{{ asset('images/tools/budget/plus.png') }}" width="30" alt="Movimientos">

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
