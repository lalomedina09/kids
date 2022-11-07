@if($advice)
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-white text-uppercase text-center small">
                Confirmar <span class="text-danger"> no ofrecer <br> </span> la opcion de reagendar <br><br>
            </h3>
        </div>

        <div class="col-md-12">
            <form action="{{ route('reschedules.modal.block.store') }}" method="post">
            @csrf

            <input type="hidden" name="advice_id" value="{{ $advice->id }}">
                <div class="form-group text-center">
                    <label for="advice_description" class="small">
                        ¿Porque no ofreces esta opción a
                        <span class="text-danger">{{ $advice->advised->fullname }}</span>?
                    </label>
                    <textarea class="form-control" name="description" required="required" style="width: 65%;margin:auto;"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-pill btn-danger animated tada" title="">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif
