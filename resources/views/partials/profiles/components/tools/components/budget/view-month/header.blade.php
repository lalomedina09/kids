<div class="col-md-6">
    <div class="row">
        <div class="col-md-3 text-bold">
            <br>
            Abril |
        </div>
        <div class="col-md-4">
            <label for="months" class="control-label text-uppercase custom-f-s-small"
                    title="List Months">* @lang('Month')</label>
            <select name="month_id" class="form-control" required="required">
                @foreach ($listMonths as $month => $name)
                    <option value="{{ $month }}">
                            {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="years" class="control-label text-uppercase custom-f-s-small"
                    title="List Years">* @lang('Year')</label>
            <select name="year_id" class="form-control" required="required">
                @foreach ($listYears as $year )
                    <option value="{{ $year }}">
                            {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!--<span>Abril</span> <span> | Mes Abril Año 2023</span>-->
</div>

<div class="col-md-6">
    <div class="row header-bg-gradient">
        <div class="col-md-3">
            <p class="small text-white text-bold mt-3">Resumen del mes</p>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-3">
                    <span style="font-size: .8rem">Lo que entra</span>
                    <p style="font-size: 1rem">$10,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-3">
                    <span style="font-size: .8rem">Lo que sale</span>
                    <p style="font-size: 1rem">$6,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-3">
                    <span style="font-size: .8rem">Total</span>
                    <p style="font-size: 1rem">$4,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
