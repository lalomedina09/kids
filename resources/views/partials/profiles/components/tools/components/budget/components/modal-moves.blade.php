<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMoves">
    ver movimientos
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modalMoves" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 20px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;">
                Movimientos de Abril
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('images/tools/budget/minimize.png') }}" alt="Return" width="20">
                <!--<span aria-hidden="true">&times;</span>-->
            </button>
        </div>
        <div class="modal-body">
            <!------------------------------------->
            <div class="row">
                <div class="col-md-4 text-center small">
                   <span class="text-bold" style="font-size: 0.9rem;">
                        Concepto
                    </span>
                </div>
                <div class="col-md-4 text-center small">
                    <span class="text-bold" style="font-size: 0.9rem;">
                        Cantidad
                    </span>
                </div>
                <div class="col-md-4 text-center small">
                    <span class="text-bold" style="font-size: 0.9rem;">
                        Fecha
                    </span>
                </div>
                <br>
            </div>
            <!------------------------------------->
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Recibo de agua" class="form-control custom-input-text" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$1,000 MXN" class="form-control custom-input-text" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------>
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Recibo de Luz" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$2,000 MXN" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text custom-input-transparent"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------>
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Recibo de Gas" class="form-control custom-input-text" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$500 MXN" class="form-control custom-input-text" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------>
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Renta" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$2,500 MXN" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text custom-input-transparent"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------>
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Cáfe" class="form-control custom-input-text" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$300 MXN" class="form-control custom-input-text" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------>
            <div class="row mb-2">
                <div class="col-md-4 text-center">
                    <input type="text" value="Antojitos" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega una categoría">
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" value="$500 MXN" class="form-control custom-input-text custom-input-transparent" placeholder="Agrega el monto real">
                </div>
                <div class="col-md-4 text-center">
                    <input type="date" name="birthdate"
                        id="user-birthdate" class="form-control datetimepicker-input custom-input-text custom-input-transparent"
                        data-target="#user-birthdate" data-toggle="datetimepicker" value="{{ optional($user->getMeta('blog', 'birthdate'))->format('Y-m-d') }}">
                </div>
                <br>
            </div>

            <!------------------------------------->
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>-->
      </div>
    </div>
  </div>
