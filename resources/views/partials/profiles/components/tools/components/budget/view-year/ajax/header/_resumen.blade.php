
<div class="col-md-4">
    <div class="row">
        <div class="col-md-4">
            <p class="mt-4" style="font-weight: bold; font-size: 1.7rem;">{{ $year }}</p>
        </div>
        <div class="col-md-1">
            <p class="mt-4">|</p>
        </div>
        <div class="col-md-6">
            <label for="years" class="control-label text-uppercase custom-f-s-small"
                    title="List Years">* @lang('Year')</label>
            <select name="budget_year" id="budget_year" class="form-control" required="required">
                @foreach ($listYears as $_year )
                    <option value="{{ $_year }}" @if($_year == $year) selected @endif>
                            {{ $_year }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!--<span>Abril</span> <span> | Mes Abril Año 2023</span>-->
</div>

<div class="col-md-8">
    <div class="row header-bg-gradient">
        <div class="col-md-3">
            <p class="small text-white text-bold mt-2" style="font-size: 1.1rem;">Resumen anual</p>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que entra</span>
                    <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($entrances, 2) }}
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que sale</span>
                    <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($exists, 2) }}
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Total</span>
                    <p style="font-size: 0.9rem; font-weight: bold;">${{ number_format($total, 2) }}
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

