<label for="months" class="control-label text-uppercase custom-f-s-small"
        title="List Months">* @lang('Month')</label>
<select name="month_id" class="form-control" required="required">
    @foreach ($listMonths as $month => $name)
        <option value="{{ $month }}">
                {{ $name }}
        </option>
    @endforeach
</select>
