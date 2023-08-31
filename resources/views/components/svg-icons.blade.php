@props(['icon'])

<svg {{ $attributes }} viewBox="0 0 24 24">
    <use xlink:href="{{ asset('Icons/' . $icon) }}"></use>
</svg>
