<!-- Modal -->
<div id="modalPriceEditRating" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-right">Actualizar rango de precios</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.parameters.prices.rating') }}" method="post">
            @csrf
            <form class="form-horizontal" role="form">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Ejemplo: 100" value="{{ $priceRating->id }}">
                <div class="form-group col-sm-12">
                    <label for="_lft" class="control-label">Costo Mínimo</label>
                    <input type="number" class="form-control" required id="_lft" name="_lft" placeholder="Ejemplo: 100" value="{{ $priceRating->_lft }}">
                </div>
                <div class="form-group col-sm-12">
                    <label for="_rgt" class="control-label">Costo Máximo</label>
                    <input type="number" class="form-control" required id="_rgt" name="_rgt" placeholder="Ejemplo: 700" value="{{ $priceRating->_rgt }}">
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Actualizar Precios</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
        </div>
    </div>
  </div>
</div>
