@php $icon = $icon ?? 'star' @endphp

<p class="{{ $icon }}-rate text-nowrap mb-1" title="{{ $rate }}">
    <span class="qd {{ ($rate > 0) ? "qd-{$icon}" : "qd-{$icon}-o" }} qd-{{ $size ?? 'lg' }} text-danger"></span>
    <span class="qd {{ ($rate > 1) ? "qd-{$icon}" : "qd-{$icon}-o" }} qd-{{ $size ?? 'lg' }} text-danger"></span>
    <span class="qd {{ ($rate > 2) ? "qd-{$icon}" : "qd-{$icon}-o" }} qd-{{ $size ?? 'lg' }} text-danger"></span>
    <span class="qd {{ ($rate > 3) ? "qd-{$icon}" : "qd-{$icon}-o" }} qd-{{ $size ?? 'lg' }} text-danger"></span>
    <span class="qd {{ ($rate > 4) ? "qd-{$icon}" : "qd-{$icon}-o" }} qd-{{ $size ?? 'lg' }} text-danger"></span>
</p>
