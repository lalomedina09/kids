<div class="row">
    <div class="col-md-12">
        <h3 class="text-white text-center">Agregar movimiento | Lo que entra</h3>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3 text-center">
        <input type="text" class="form-control" id="category_id" value="{{ $categoryId }}" required placeholder="Id Category Parent">
        <span class="small">
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
        <input type="text" class="form-control" id="name" required placeholder="Agrega la Categoría">
    </div>
    <div class="col-md-3 text-center">
        <span class="small">
                Cantidad estimada
        </span>
        <input type="text" class="form-control" id="estimated" required placeholder="Agrega el monto estimado">
    </div>

    <div class="col-md-3 text-center">
        <span class="small">
                Cantidad Real
        </span>
        <input type="text" class="form-control" id="real" required placeholder="Agrega el monto real">
    </div>
    <div class="col-md-2">
        <br>
        <button class="redondo" onclick="saveMoveBudget();">
            <i class="lni lni-checkmark" style="color: #fff; font-weight: bold;"></i>
        </button>
    </div>
</div>
