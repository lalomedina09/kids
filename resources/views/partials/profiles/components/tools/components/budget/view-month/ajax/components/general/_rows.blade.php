@foreach ($categoryRows as $row)
    @php
        $date = dateRemoveHours($row->created_at);
        $counter++;
        $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
    @endphp

    <div class="row mb-2">
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
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'created_at', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $date }}">
        </div>
        <div class="col-md-2 text-center">
            <button class="button-add"
           onclick="openModalAddMoveToCategory('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
           title="¿Agregar movimiento a la categoría {{ $row->customCategory->name}}?">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <button class="button-edit"
           onclick="openModalDeleteMove('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
           title="¿Editar movimientos de la categoría {{ $row->customCategory->name}}?">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
           <button class="button-delete"
           onclick="openModalDeleteMove('{{ $section }}', {{$category_id}}, '{{ $idArrowsName }}', '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}', {{ $row->id }});"
           title="¿Eliminar categoría {{ $row->customCategory->name}}?">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </button>

            <!--
                alo mejor se llega a utilizar esta opcion
                <i class="fa fa-list" aria-hidden="true"></i>
            -->
        </div>
        <br>
    </div>
@endforeach

