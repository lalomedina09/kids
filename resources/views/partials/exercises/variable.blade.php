@php
    $value = array_get($answers, $variable, '0.0');
    $format = $format ?? '';
@endphp

<li class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
        <p class="m-0">{{ $label }}</p>
        <p class="m-0">
            <span
                data-variable="{{ $variable }}"
                data-value="{{ $value }}"
                data-format="{{ $format ?? '' }}"
                data-mutable="{{ $mutable ?? '' }}"
            >{{ format_value($value, $format) }}</span>
        </p>
    </div>
</li>
