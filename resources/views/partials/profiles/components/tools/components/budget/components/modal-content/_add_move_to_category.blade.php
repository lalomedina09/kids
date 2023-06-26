<div class="row">
    <div class="col-md-12">
        <h3 class="text-white text-center">
            Agregar movimiento en la categoría <span style="color:black">"{{$onlyCategoriesUser->name}}"</span>
        </h3>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3 text-center">
        <input class="form-control" type="hidden" name="budgetId" id="budgetId" value="{{ $budget->id }}">
        <input type="hidden" class="form-control" id="formAddMove_category_user_id" value="{{ $onlyCategoriesUser->id }}" required placeholder="Id Category User" style="font-size: 0.8rem;">
        <input type="hidden" class="form-control" id="formAddMove_category_id" value="{{ $categoryId }}" required placeholder="Id Category Parent" style="font-size: 0.8rem;">
        <input type="hidden" class="form-control" id="formAddMove_percent" value="0" required>
        <span style="font-size:65%">
            Movimiento
        </span>
        <!-- Comente label porque aqui vamos agregar categorias nuevas que aun no esten registrados en la DB-->
        {{--<select name="month_id" class="form-control" required="required">
            @foreach ($categoriesUser as $category)
                <option value="{{ $category->id }}">
                        {{ $category->name }}
                </option>
            @endforeach
        </select>--}}
        <input type="text" class="form-control" id="formAddMove_name" required placeholder="Nuevo movimiento" style="font-size: 0.8rem;text-align: center;">
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
        required placeholder="Agregar monto" style="font-size: 0.8rem;">
    </div>
    <div class="col-md-2 text-center">
        <span style="font-size:65%">
                Fecha
        </span>
        <input type="date" class="form-control" id="formAddMove_date" value="{{ $created_at }}" style="font-size: 0.8rem;text-align: center;">
    </div>
    <div class="col-md-2">
        <br>
        <button class="redondo" onclick="saveMoveToCategoryBudget('{{$section}}', '{{ $divCategory }}', '{{ $divAmountEstimate }}', '{{ $divAmountReal }}');">
            <i class="lni lni-checkmark" style="font-weight: bold;"></i>
        </button>
        <div id="budgetMonthLoadingEditOrDeleteMove" style="display:none">
            <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
        </div>
    </div>
</div>

