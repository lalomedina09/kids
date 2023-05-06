<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-7">
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
                        <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                            alt="Loading 3"
                            width="20"
                            style="display: block; margin-left: 35%;
                        ">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-bg-white">
                    <div class="space-left-in mt-2">
                        <span style="font-size: .8rem">Lo que sale</span>
                        <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                            alt="Loading 3"
                            width="20"
                            style="display: block; margin-left: 35%;
                        ">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-bg-white">
                    <div class="space-left-in mt-2">
                        <span style="font-size: .8rem">Total</span>
                        <img src="{{ asset('images/gif/loading/circle-black.gif') }}"
                            alt="Loading 3"
                            width="20"
                            style="display: block; margin-left: 35%;
                        ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------>
<div class="row mt-4">
    <div class="col-md-3 text-left">
        <a class="btn-white-tool-budget btn-radius-tool-budget custom-ml-5" href="#{{ str_slug(__('Calendar Budget')) }}" data-toggle="tab">
            Calendario
            <img src="{{ asset('images/tools/budget/calendar-black.png') }}" width="25" alt="Lo que entra">
        </a>
    </div>
    <div class="col-md-3 text-left">
        <a class="btn-dark-tool-budget btn-radius-tool-budget" href="#{{ str_slug(__('Report Annual')) }}" data-toggle="tab">
            <span class="text-color-gradient">
                Reporte
            </span>
            <img src="{{ asset('images/tools/budget/report-white.png') }}" width="25" alt="Lo que sale">
        </a>
    </div>
</div>
