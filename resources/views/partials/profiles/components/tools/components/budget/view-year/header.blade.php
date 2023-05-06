
<div class="col-md-4">
    <div class="row">
        <div class="col-md-7">
            {{--<label for="months" class="control-label text-uppercase custom-f-s-small"
                    title="List Months">* @lang('Month')</label>
            <select name="month_id" class="form-control" required="required">
                @foreach ($listMonths as $month => $name)
                    <option value="{{ $month }}">
                            {{ $name }}
                    </option>
                @endforeach
            </select>--}}
            <br>
            <span>2022</span>
        </div>
        <div class="col-md-5">
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

<div class="col-md-8">
    <div class="row header-bg-gradient">
        <div class="col-md-3">
            <p class="small text-white text-bold mt-2" style="font-size: 1.1rem;">Resumen anual</p>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que entra</span>
                    <p style="font-size: 1rem; font-weight: bold;">$120,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Lo que sale</span>
                    <p style="font-size: 1rem; font-weight: bold;">$60,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-bg-white">
                <div class="space-left-in mt-2">
                    <span style="font-size: .8rem">Total</span>
                    <p style="font-size: 1rem; font-weight: bold;">$40,000
                        <span style="font-size: .8rem">MXN</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
