<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMove">
    Agregar movimiento
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modalAddMove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content modal-add-move">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <span>
                        Nombre de la categoría
                    </span>
                </div>
                <div class="col-md-2">
                    <select name="month_id" class="form-control" required="required">
                        @foreach ($listMonths as $month => $name)
                            <option value="{{ $month }}">
                                    {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <span>
                            Cantidad estimada
                    </span>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control custom-input-text" placeholder="Agrega el monto real">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
