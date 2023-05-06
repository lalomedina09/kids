<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddMove">
    Agregar movimiento
</button>-->
<!--<img src="{{ asset('images/gif/loading/circle.gif') }}" alt="Loading 1" width="150">
<img src="{{ asset('images/gif/loading/circle-blue.gif') }}" alt="Loading 2" width="150">
<img src="{{ asset('images/gif/loading/circle-gray.gif') }}" alt="Loading 3" width="100">
<img src="{{ asset('images/gif/loading/circle-black.gif') }}" alt="Loading 4" width="50">-->
  <!-- Modal -->
  <div class="modal fade" id="modalAddMove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content modal-add-move" style="border-radius: 20px;">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-white text-center">Agregar movimiento | Lo que entra</h3>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 text-center">
                    <span class="small">
                        Nombre de la categoría
                    </span>
                    <select name="month_id" class="form-control" required="required">
                        @foreach ($listMonths as $month => $name)
                            <option value="{{ $month }}">
                                    {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 text-center">
                    <span class="small">
                            Cantidad estimada
                    </span>
                    <input type="text" class="form-control" placeholder="Agrega el monto estimado">
                </div>

                <div class="col-md-3 text-center">
                    <span class="small">
                            Cantidad Real
                    </span>
                    <input type="text" class="form-control" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="redondo">
                        <i class="lni lni-checkmark" style="color: #fff; font-weight: bold;"></i>
                    </button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
