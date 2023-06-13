<div class="row">
    <div class="col-md-12">
        <h3 class="text-white text-center">
            Agregar categoría a sección |
            <span style="color:black">
                {{ $categoriesUser->name }}
                {{--@if($section == 'entrances') Lo que entra @else Lo que sale @endif--}}
            </span>

        </h3>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3 text-center">
        <input type="hidden" class="form-control" id="formAddMove_category_id" value="{{ $categoryId }}" required placeholder="Id Category Parent" style="font-size: 0.8rem;">
        <input type="hidden" class="form-control" id="formAddMove_percent" value="0" required>
        <span style="font-size:65%">
            Nombre de la categoría
        </span>
        <!-- Comente label porque aqui vamos agregar categorias nuevas que aun no esten registrados en la DB-->
        {{--<select name="month_id" class="form-control" required="required">
            @foreach ($categoriesUser as $category)
                <option value="{{ $category->id }}">
                        {{ $category->name }}
                </option>
            @endforeach
        </select>--}}
        <input type="text" class="form-control" id="formAddMove_name" required placeholder="Nueva categoría" style="font-size: 0.8rem;text-align: center;">
    </div>
    <div class="col-md-2 text-center">
        <span style="font-size:65%">
            @if($section == 'entrances')
                Lo que creo recibir
            @else
                Lo que creo gastar
            @endif
        </span>
        <input type="text" class="form-control" id="formAddMove_estimated" onkeypress="return valideKey(event);"
        required placeholder="Agregar monto" style="font-size: 0.8rem;text-align: center;">

    </div>

    <div class="col-md-2 text-center">
        <span style="font-size:65%">
            @if($section == 'entrances')
                Lo que recibí
            @else
                Lo que gasté
            @endif
        </span>
        <input type="text" class="form-control" id="formAddMove_real" onkeypress="return valideKey(event);"
        required placeholder="Agregar monto" style="font-size: 0.8rem;text-align: center;">
    </div>
    <div class="col-md-2 text-center">
        <span style="font-size:65%">
                Fecha
        </span>
        <input type="date" class="form-control" id="formAddMove_date" value="{{ $created_at }}" style="font-size: 0.8rem;">
    </div>
    <div class="col-md-2">
        <br>
        <button class="redondo" onclick="saveCategoryBudget('{{$section}}', '{{ $divCategory }}', '{{ $divAmountEstimate }}', '{{ $divAmountReal }}');">
            <i class="lni lni-checkmark" style="font-weight: bold;"></i>
        </button>
        <div id="budgetMonthLoadingAddMove" style="display:none">
            <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div class="mt-2">
            <label class="containerCheck">
                <span class="small">
                    Repetir movimiento en los proximos meses del año
                </span>
                <input type="checkbox" id="addMovePostMonth" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
</div>
