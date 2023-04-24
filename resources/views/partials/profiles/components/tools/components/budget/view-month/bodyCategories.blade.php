<div class="row mt-4">
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget custom-ml-6">
            Lo que entra
            <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget">
            <span class="text-color-gradient"> Lo que sale </span>
            <img src="{{ asset('images/tools/budget/out-white.png') }}" width="30" alt="Lo que sale">
        </a>
    </div>
    <div class="col-md-4 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget">
            Movimientos <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
        </a>
    </div>
</div>

<!--
    <div class="col-md-12 mt-4">
    </div>
-->
<div class="row mt-1">
    <div class="col-md-12" style="background-color: #eeeeee">
            <!--textasbxajsbnxj <br>
            textasbxajsbnxj <br>
            textasbxajsbnxj <br>
            textasbxajsbnxj <br>
            textasbxajsbnxj <br>-->

            @include('partials.profiles.components.tools.components.budget.view-month.categories.fijos')

            @include('partials.profiles.components.tools.components.budget.view-month.categories.gustos')

            @include('partials.profiles.components.tools.components.budget.view-month.categories.ahorros')
            {{--
            --}}
    </div>
</div>
