<!-- onkeydown-->
<div class="row mb-2">
    <div class="col-md-4 text-center">
        <input type="text"
        id="name_{{ $row->id}}"
        class="form-control custom-input-text {{ $class}}"
        onchange="budgetEditInput('{{$section}}', 'name', {{ $row->id }});"
        value="{{ $row->customCategory->name}}">
    </div>
    <div class="col-md-3 text-center">
        <input type="text"
        id="estimated_{{ $row->id }}"
        class="form-control custom-input-text {{ $class}}"
        onchange="budgetEditInput('{{$section}}', 'estimated', {{ $row->id }});"
        value="{{ $row->amount_estimated }}">
    </div>
    <div class="col-md-3 text-center">
        <input type="text"
        id="real_{{ $row->id }}"
        class="form-control custom-input-text {{ $class}}"
        onchange="budgetEditInput('{{$section}}', 'real', {{ $row->id }});"
        value="{{ $row->amount_real }}">
    </div>
    <div class="col-md-2 text-center">
        <input type="date"
        id="created_at_{{ $row->id }}"
        class="form-control custom-input-text {{ $class}}"
        onchange="budgetEditInput('{{$section}}', 'created_at', {{ $row->id }});"
        value="{{ $date }}">
    </div>
    <br>
</div>
