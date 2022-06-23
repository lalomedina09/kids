@php
    $value = array_get($answers, $variable, '0.0');
    $format = $format ?? '';
@endphp

<div class="card-footer d-flex justify-content-between">
    <p class="mb-0 font-weight-bold">{{ $label }}</p>
    <p class="mb-0">
        <span class="font-weight-bold"
            data-variable="{{ $variable }}"
            data-value="{{ $value }}"
            data-format="{{ $format ?? '' }}"
        >{{ format_value($value, $format) }}</span>
    </p>
</div>
