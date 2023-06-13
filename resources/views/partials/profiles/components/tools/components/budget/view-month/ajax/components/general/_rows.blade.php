@foreach ($categoryRows as $row)
    @php
        $date = dateRemoveHours($row->created_at);
        $counter++;
        $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
    @endphp

    <div class="row mb-">
        <div class="col-md-2 text-center">
            <input type="text"
            id="name_{{ $row->id}}"
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'name', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $row->customCategory->name}}">
        </div>
        <div class="col-md-3 text-center">
            <input type="text"
            id="estimated_{{ $row->id }}"
            @if(count($row->customCategory->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'estimated', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            @if($row->amount_estimated> 0)
                value="{{ $row->amount_estimated }}"
            @else
                placeholder="{{ $row->amount_estimated }}"
            @endif
            >
        </div>
        <div class="col-md-3 text-center">
            <input type="text"
            id="real_{{ $row->id }}"
            @if(count($row->customCategory->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'real', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            @if($row->amount_real > 0)
                value="{{ $row->amount_real }}"
            @else
                placeholder="{{ $row->amount_real }}"
            @endif
            >
        </div>
        <div class="col-md-2 text-center">
            <input type="date"
            id="created_at_{{ $row->id }}"
            @if(count($row->customCategory->moves) > 1) readonly title="Editalo desde la opción de acciones" @endif
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'created_at', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
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
                    @if (count($row->customCategory->moves) >= 1)
                        <li style="margin-bottom: 7px; text-decoration:none;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none;"
                            title="¿Agregar movimiento a la categoría {{ $row->customCategory->name}}?"
                            onclick="openModalAddMoveToCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
                            >
                            Agregar movimiento
                            </a>
                        </li>
                        <li style="margin-bottom: 7px;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none;"
                            title="¿Editar movimientos de la categoría {{ $row->customCategory->name}}?"
                            onclick="openModalShowMovesForEditOrDelete('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
                            >
                            Ver movimientos
                            </a>
                        </li>
                        <li style="margin-bottom: 7px;">
                            <a href="#"
                            style="font-size: .8rem; margin-left: 15px; text-decoration:none;"
                            title="¿Eliminar categoría {{ $row->customCategory->name}}?"
                            onclick="openModalDeleteCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
                            >
                            Eliminar {{ $row->customCategory->name}}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-1 text-center">
            <span class="span-small-rounded-corners-gradient-borders" title="Número de movimientos {{ count($row->customCategory->moves) }}">
                {{ count($row->customCategory->moves) }}
            </span>
        </div>
        <br>
    </div>
@endforeach

