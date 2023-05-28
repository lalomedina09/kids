<label for="years" class="control-label text-uppercase custom-f-s-small"
        title="List Years">* @lang('Year')</label>
<select name="year_id" id="budget_year_id" class="form-control" required="required" onchange="changeDateMonthSection('{{$section}}')">
    @foreach ($listYears as $_year )
        <option value="{{ $_year }}" @if($_year == $year) selected @endif>
            {{ $_year }}
        </option>
    @endforeach
</select>
