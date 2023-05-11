@php $counter = 1; @endphp

@foreach ($rows as $row)
    @php
        $date = dateRemoveHours($row->created_at);
        $counter++;
        $classTransparent = (($counter % 2) == 0) ? "custom-input-transparent" : null ;
    @endphp
    <div class="row mb-2">
        <div class="col-md-4 text-center">
            <input type="text" class="form-control custom-input-text {{ $classTransparent}}" value="{{ $row->customCategory->name}}">
        </div>
        <div class="col-md-3 text-center">
            <input type="text" class="form-control custom-input-text {{ $classTransparent}}" value="{{ $row->amount_estimated }}">
        </div>
        <div class="col-md-3 text-center">
            <input type="text" class="form-control custom-input-text {{ $classTransparent}}" value="{{ $row->amount_real }}">
        </div>
        <div class="col-md-2 text-center">
            <input type="date" class="form-control custom-input-text {{ $classTransparent}}" value="{{ $date }}">
        </div>
        <br>
    </div>
@endforeach
