
@foreach ($btns as $btn)
    @php $btnSection = $btn['section']; @endphp
    <div class="col-md-3 text-left">
        <a class="
            @if ($section == $btnSection)
            btn-dark-tool-budget
            @else
            btn-white-tool-budget
            @endif
            btn-radius-tool-budget
            custom-ml-5"
            href="#"
            onclick="activeBudgetSectionMonthMenu('{{ $btnSection }}');">
            @if ($section == $btnSection)
                <span class="text-color-gradient"> {{ $btn['title']}} </span>
                <img src="{{ asset($btn['img_white']) }}"
                    width="30"
                    alt="Lo que entra"
                >
            @else
                {{ $btn['title']}}
                <img src="{{ asset($btn['img_black']) }}"
                    width="30"
                    alt="Lo que entra"
                >
            @endif
        </a>
    </div>
@endforeach
<div class="col-md-3 text-left">
    <div id="budgetSectionMonthBtnsLoading" style="display:none">
        <img src="{{ asset('images/gif/loading/circle-black.gif') }}" alt="Loading 4" width="30">
        <!--<span style="font-size:.8rem">.... <span>-->
    </div>
</div>

{{--dd($btns)--}}
{{--
<div class="col-md-3 text-left">
    <a class="btn-dark-tool-budget btn-radius-tool-budget custom-ml-5"
        href="#{{ str_slug(__('Section Entrances')) }}"
        data-toggle="tab"
        onclick="responseDataSectionMonthContent('entrances');">>
        <span class="text-color-gradient"> Lo que entra </span>
        <img src="{{ asset('images/tools/budget/enter-black.png') }}" width="30" alt="Lo que entra">
    </a>
</div>
<div class="col-md-3 text-left">
    <a class="btn-white-tool-budget btn-radius-tool-budget"
        href="#{{ str_slug(__('Section Exists')) }}"
        data-toggle="tab"
        onclick="responseDataSectionMonthContent('exits');">>
        Lo que sale
        <img src="{{ asset('images/tools/budget/out-white.png') }}" width="30" alt="Lo que sale">
    </a>
</div>
<div class="col-md-4 text-left">
    <a class="btn-white-tool-budget btn-radius-tool-budget"
        href="#{{ str_slug(__('Section Movements')) }}"
        data-toggle="tab"
        onclick="responseDataSectionMonthContent('movements');">>
        Movimientos <img src="{{ asset('images/tools/budget/moves-dark.png') }}" width="30" alt="Movimientos">
    </a>
</div>
--}}
