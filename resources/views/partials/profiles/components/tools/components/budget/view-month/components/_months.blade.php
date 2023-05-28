<label for="months" class="control-label text-uppercase custom-f-s-small"
        title="List Months">* @lang('Month')</label>
        {{--
        @foreach ($listMonths as $_month => $name)
        {{dd($_month, $month)}}
        @endforeach
        --}}
<select name="month_id" id="budget_month_id" class="form-control" required="required" onchange="changeDateMonthSection('{{$section}}')">
    @foreach ($listMonths as $_month => $name)
        <option value="{{ $_month }}" @if($_month == $month) selected @endif>
                {{ $name }}
        </option>
    @endforeach
</select>
