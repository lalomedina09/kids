<div class="{{ $class }} {{ (isset($size)) ? "{$class}-{$size}" : '' }}">
    <input type="radio" name="{{ $field_name }}"
        id="{{ $class }}-5"
        value="5" />
    <label class="full" for="{{ $class }}-5"></label>

    @if (isset($halves))
        <input type="radio" name="{{ $field_name }}"
            id="{{ $class }}-4-half"
            value="4.5" />
        <label class="half" for="{{ $class }}-4-half"></label>
    @endif

    <input type="radio" name="{{ $field_name }}"
        id="{{ $class }}-4"
        value="4" />
    <label class="full" for="{{ $class }}-4"></label>

    @if (isset($halves))
        <input type="radio" name="{{ $field_name }}"
            id="{{ $class }}-3-half"
            value="3.5" />
        <label class="half" for="{{ $class }}-3-half"></label>
    @endif

    <input type="radio" name="{{ $field_name }}"
        id="{{ $class }}-3"
        value="3" />
    <label class="full" for="{{ $class }}-3"></label>

    @if (isset($halves))
        <input type="radio" name="{{ $field_name }}"
            id="{{ $class }}-2-half"
            value="2.5" />
        <label class="half" for="{{ $class }}-2-half"></label>
    @endif

    <input type="radio" name="{{ $field_name }}"
        id="{{ $class }}-2"
        value="2" />
    <label class="full" for="{{ $class }}-2"></label>

    @if (isset($halves))
        <input type="radio" name="{{ $field_name }}"
            id="{{ $class }}-1-half"
            value="1.5" />
        <label class="half" for="{{ $class }}-1-half"></label>
    @endif

    <input type="radio" name="{{ $field_name }}"
        id="{{ $class }}-1"
        value="1" />
    <label class="full" for="{{ $class }}-1"></label>

    @if (isset($halves))
        <input type="radio" name="{{ $field_name }}"
            id="{{ $class }}-0-half"
            value="0.5" />
        <label class="half" for="{{ $class }}-0-half"></label>
    @endif
</div>
