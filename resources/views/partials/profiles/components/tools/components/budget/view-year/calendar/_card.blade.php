<div class="col-md-4">
    <div class="calendar-card-month">
        <div class="row mb-1">
            <div class="col-md-12 text-center mt-3">
                <div class="row">
                    <div class="col-md-12 text-right" style="margin-bottom: -20px;">
                        <a href="#" onclick="openModalBudgetZoom('entrances');" style="margin-right: 10px;">
                            <img src="{{ asset('images/tools/budget/zoom-in.png') }}" width="25" alt="Zoom">
                        </a>
                    </div>
                    <div class="col-md-12 text-center">
                        <span class="b-calendar-name-month">
                            {{ $name }}
                        </span>
                    </div>
                </div>

                <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
                <span style="font-weight:700; font-size: 1.1rem;">Lo que entra</span>
                <br>
                @include('partials.profiles.components.tools.components.budget.view-year.calendar._card-enter')

                <img src="{{ asset('images/tools/budget/out-black.png') }}" width="30" alt="Lo que sale">
                <span style="font-weight:700; font-size: 1.1rem;">Lo que sale</span>
                <br>
                @include('partials.profiles.components.tools.components.budget.view-year.calendar._card-out')

                @include('partials.profiles.components.tools.components.budget.view-year.calendar._categories')

                <div class="mb-3 mt-1">
                    <a href="#" onclick="openModalMoves('entrances');" title="Ver movimientos del mes">
                        <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="25" alt="Movimientos">
                        <span style="font-weight:700; font-size: 1.1rem; color:#000;">Movimientos</span>
                        <img src="{{ asset('images/tools/budget/plus.png') }}" width="25" alt="Movimientos">

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
