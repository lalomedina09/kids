<div class="row">
    <div class="col-md-12">
        <h5 class="text-center" style="color:#fc7c7c">
            ¿Eliminar categoria "{{ $budget->customCategory->name }}"?
        </h5>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <p class="small">Detalle del concepto</p>
        <p class="small">
            Monto Estimado: <span style="color:#fc7c7c"> ${{ number_format($budget->amount_estimated, 2) }} </span> <br>
            Monto Real: <span style="color:#fc7c7c"> ${{ number_format($budget->amount_real, 2) }} </span> <br>
            Creado: <span style="color:#fc7c7c"> {{ fechaEspanol($budget->created_at) }} </span>
        </p>
        <br>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="mt-2">
            <input type="hidden" id="formDeleteMove_ts_category_user_id" value="{{ $budget->ts_category_user_id }}">
            <input type="hidden" id="formDeleteMove_name" value="{{ $budget->customCategory->name }}">
            <input type="hidden" id="formDeleteMove_id" value="{{ $budget->id }}">
            <label class="containerCheck">
                <span class="small">
                    Quitar Movimiento "{{ $budget->customCategory->name }}" existentes en los próximos meses
                </span>
                <input type="checkbox" id="deleteMovePostMonth" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <!------------------------->
    <div class="col-md-1"></div>
    <div class="col-md-11 text-center">
        <button class="button-confirm-delete"
            onclick="deleteMoveBudget('{{$section}}', '{{ $divCategory }}', '{{ $divAmountEstimate }}', '{{ $divAmountReal }}');">
            Eliminar movimiento
        </button>
        <div id="budgetMonthLoadingDeleteMove" style="display:none">
            <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
        </div>
    </div>
</div>
