
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
        <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
    </div>
</div>

