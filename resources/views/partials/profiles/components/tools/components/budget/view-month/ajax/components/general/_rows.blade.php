@foreach ($categoryRows as $row)
    @php
        $date = dateRemoveHours($row->created_at);
        $counter++;
        $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
    @endphp

    <div class="row mb-2">
        <div class="col-md-4 text-center">
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
            value="{{ $row->amount_estimated }}">
        </div>
        <div class="col-md-3 text-center">
            <input type="text"
            id="real_{{ $row->id }}"
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'real', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $row->amount_real }}">
        </div>
        <div class="col-md-2 text-center">
            <input type="date"
            id="created_at_{{ $row->id }}"
            class="form-control custom-input-text {{ $class}}"
            onchange="budgetEditInput('{{$section}}', 'created_at', {{ $row->id }}, '{{ $idCategoryAmountReal}}', '{{ $idCategoryAmountEstimate }}');"
            value="{{ $date }}">
        </div>
        <br>
    </div>
@endforeach

