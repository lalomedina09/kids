<div class="row">
    <div class="col-md-12">
        <h3 class="text-white text-center">
            Movimientos de la categoría |
            <span style="color:black">
                {{ $categoriesUser->name }}
            </span>
        </h3>
        <p class="text-white text-center"> Edita o elimina movimientos de la categoría</p>
    </div>
</div>
    <!------------------------------------>
    <div class="row">
            <div class="col-md-1">.</div>
            <div class="col-md-3 text-center">
                <span style="font-size:65%">
                    Movimientos
                </span>
            </div>

            <div class="col-md-2 text-center">
                <span style="font-size:65%">
                    @if($section == 'entrances')
                        Lo que creo recibir
                    @else
                        Lo que creo gastar
                    @endif
                </span>
            </div>

            <div class="col-md-2 text-center">
                <span style="font-size:65%">
                    @if($section == 'entrances')
                        Lo que recibí
                    @else
                        Lo que gasté
                    @endif
                </span>
            </div>

            <div class="col-md-2 text-center">
                <span style="font-size:65%">
                        Fecha
                </span>
            </div>

            <div class="col-md-1">
                <span style="font-size:65%">
                       Quitar
                </span>
            </div>
        </div>
    <!------------------------------------>
    @php  $counter = 1; @endphp
    @foreach ($categoriesUser->moves as $move)
        @php
            $date = dateRemoveHours($move->created_at);
            $counter++;
            $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
        @endphp
        <!-- init row-->
        <div class="row" id="row_id_move_{{ $move->id }}">
            <div class="col-md-1">
                <span style="font-size: 0.9rem; color:transparent;">#{{ $counter++ }}M0{{ $move->id }}</span>
            </div>

            <div class="col-md-3 text-center">
                <input type="hidden" class="form-control" id="formAddMove_category_id" value="{{ $categoryId }}"
                required placeholder="Id Category Parent" style="font-size: 0.8rem;">

                <input type="hidden" class="form-control" id="formAddMove_percent" value="0" required>

                <!-- input nombre del movimiento-->
                <!--
                <input type="text" class="form-control" id="formAddMove_name" value="{{ $move->name }}"
                 required placeholder="Nueva categoría" style="font-size: 0.8rem;text-align: center;">
                -->
                <input type="text"
                    id="name_move_{{ $move->id }}"
                    class="form-control"
                    onchange="budgetEditInput('{{$section}}', 'name_move', {{ $move->id }}, '{{ $divAmountReal}}', '{{ $divAmountEstimate }}', {{ $move->customCategory->id }});"
                    value="{{ $move->name }}"
                >
            </div>

            <div class="col-md-2 text-center">
                <input type="text"
                    id="estimated_{{ $move->id }}"
                    class="form-control"
                    onchange="budgetEditInput('{{$section}}', 'estimated', {{ $move->id }}, '{{ $divAmountReal}}', '{{ $divAmountEstimate }}', {{ $move->customCategory->id }});"
                    value="{{ $move->amount_real }}"
                >
            </div>

            <div class="col-md-2 text-center">
                <input type="text"
                    id="real_{{ $move->id }}"
                    class="form-control"
                    onchange="budgetEditInput('{{$section}}', 'real', {{ $move->id }}, '{{ $divAmountReal}}', '{{ $divAmountEstimate }}', {{ $move->customCategory->id }});"
                    value="{{ $move->amount_real }}"
                >
            </div>

            <div class="col-md-2 text-center">
                <input type="date" class="form-control" id="formAddMove_date" value="{{ $created_at }}" style="font-size: 0.8rem;">
            </div>

            <div class="col-md-1">
                <button type="button"
                    class="button-delete"
                    title="¿Eliminar movimiento {{ $move->name}}?"
                        onclick="simpleDeleteMoveOfCategory('{{ $move->id}}', '{{ $section }}', {{$categoryId}}, '{{ $divCategory }}', '{{ $divAmountReal}}', '{{ $divAmountEstimate }}', {{ $categoriesUser->id }});"
                >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>

                <!-- Imagen que aparece mientras se hace un proceso con ajax-->
                <div id="budgetMonthLoadingAddMove" style="display:none">
                    <img src="{{ asset('images/gif/loading/loading-qdplay.gif') }}" alt="Loading 4" width="30">
                </div>
            </div>
        </div>
        <!-- end row-->
    @endforeach

