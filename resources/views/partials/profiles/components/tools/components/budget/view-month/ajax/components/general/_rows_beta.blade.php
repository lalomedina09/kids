@foreach ($categoryRows as $categoryUser)
    @php
        $date = dateRemoveHours($categoryUser->created_at);
        $counter++;
        $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
        //dd('linea 6 ');
        //tratamiento para categoria con un registro
        if (count($categoryUser->moves) == 1) {
            //Dentro del if porque solo existe un movimiento
            $onlyMove = true;
            $amount_estimated = $categoryUser->move->amount_estimated;
            $amount_real = $categoryUser->move->amount_real;
            $idInput = $categoryUser->move->id;
            $fisrtMove = $categoryUser->move;
        }else{
            //Dentro del else porque tiene mas de un movimiento
            $onlyMove = false;
            //dd($categoryUser->moves->pluck('id')->toArray(), 'guaoo');
            $amount_real = $categoryUser->moves->sum('amount_real');
            $amount_estimated = $categoryUser->moves->sum('amount_estimated');
            $idInput = $categoryUser->id;
        }
    @endphp

    <div class="row mb-">
        <div class="col-md-2 text-center">
            <input type="text"
            id="name_{{ $categoryUser->id}}"
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'name', {{ $categoryUser->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $categoryUser->name}}">
        </div>
        <div class="col-md-3 text-center">
            <input type="text"
            id="estimated_{{ $categoryUser->id }}"
            @if(count($categoryUser->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'estimated', {{ $categoryUser->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            @if($onlyMove)
                value="{{ $amount_estimated }}"
            @else
                placeholder="{{ $amount_estimated }}"
            @endif
            >
        </div>
        <div class="col-md-3 text-center">
            <input type="text"
            id="real_{{ $categoryUser->id }}"
            @if(count($categoryUser->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'real', {{ $categoryUser->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            @if($onlyMove)
                value="{{ $amount_real }}"
            @else
                placeholder="{{ $amount_real }}"
            @endif
            >
        </div>
        <div class="col-md-2 text-center">
            <input type="date"
            id="created_at_{{ $categoryUser->id }}"
            @if(count($categoryUser->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'created_at', {{ $categoryUser->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $date }}">
        </div>
        <div class="col-md-1 text-center">
            <div class="btn-group">
                <button type="button" class="button-menu-actions dropdown-toggle"
                        data-toggle="dropdown">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu" role="menu" style="background-color: rgb(54, 54, 55);">
                    @if ($onlyMove)
                        @if ($fisrtMove->amount_real >0)
                            <li style="margin-bottom: 7px; text-decoration:none;">
                                <a href="#"
                                style="font-size: .8rem; margin-left: 15px; text-decoration:none; color:#ffffff;"
                                title="¿Agregar movimiento a la categoría {{ $categoryUser->name}}?"
                                onclick="openModalAddMoveToCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $categoryUser->id }});"
                                >
                                Agregar movimiento
                                </a>
                            </li>
                        @endif
                    @elseif(!$onlyMove)
                        <li style="margin-bottom: 7px; text-decoration:none;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none; color:#ffffff;"
                            title="¿Agregar movimiento a la categoría {{ $categoryUser->name}}?"
                            onclick="openModalAddMoveToCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $categoryUser->id }});"
                            >
                            Agregar movimiento
                            </a>
                        </li>
                        <li style="margin-bottom: 7px;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none; color:#ffffff;"
                            title="¿Editar movimientos de la categoría {{ $categoryUser->name}}?"
                            onclick="openModalShowMovesForEditOrDelete('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $categoryUser->id }});"
                            >
                            Ver movimientos
                            </a>
                        </li>
                    @endif
                    @if (count($categoryUser->moves) >= 1)
                        <!-- Podra agregar un movimiento solo si el primer mov es diferente de zero -->
                        <li style="margin-bottom: 7px;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none; color:#ffffff;"
                            title="¿Eliminar categoría {{ $categoryUser->name}}?"
                            onclick="openModalDeleteCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $categoryUser->id }});"
                            >
                            Eliminar Categoría {{-- $categoryUser->name --}}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-1 text-center">
            <span class="span-small-rounded-corners-gradient-borders" title="Número de movimientos {{ count($categoryUser->moves) }}">
                {{ count($categoryUser->moves) }}
            </span>
        </div>
        <br>
    </div>
@endforeach

