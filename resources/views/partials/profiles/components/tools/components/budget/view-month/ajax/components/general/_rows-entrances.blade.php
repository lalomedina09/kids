@php $counter = 1; @endphp
@foreach ($data['constantes']->get() as $row)
    @php
        $date = dateRemoveHours($row->created_at);
        $counter++;
        $class = (($counter % 2) == 0) ? null : "custom-input-transparent" ;
    @endphp
    @include('partials.profiles.components.tools.components.budget.view-month.ajax.components.general._rows-entrances',
    array(
        'row' => $row,
        'section' => 'entrances',
        'date' => $date,
        'counter' => $counter,
        'class' => $class
    ))
@endforeach

<!-- onkeydown-->
{{--
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
--}}
