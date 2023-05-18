<label for="months" class="control-label text-uppercase custom-f-s-small"
        title="List Months">* @lang('Month')</label>
        {{--
        @foreach ($listMonths as $_month => $name)
        {{dd($_month, $month)}}
        @endforeach
        --}}
<select name="month_id" class="form-control" required="required">
    @foreach ($listMonths as $_month => $name)
        <option value="{{ $_month }}" @if($_month == $month) selected @endif>
                {{ $name }}
        </option>
    @endforeach
</select>
