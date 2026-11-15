{{--
    A drawn movie poster for the poster wall: one of six motifs ($v, 0-5) in
    one hue ($h, 0-360), with two title bars at the bottom. No text, no
    images, so it works for any shop and costs nothing to load.
--}}
@props(['v' => 0, 'h' => 270])
@php
    $c = fn (int $s, int $l, float $a = 1) => "hsl($h $s% $l% / $a)";
    $d = fn (int $s, int $l, float $a = 1) => 'hsl(' . (($h + 40) % 360) . " $s% $l% / $a)";
@endphp
<svg viewBox="0 0 100 150" preserveAspectRatio="xMidYMid slice" aria-hidden="true" {{ $attributes->merge(['class' => 'ag-poster']) }}>
    <rect width="100" height="150" fill="{{ $c(45, 12) }}" />
    @switch($v % 6)
        @case(0) {{-- a sun over mountains --}}
            <rect width="100" height="150" fill="{{ $c(60, 30, .6) }}" />
            <circle cx="50" cy="62" r="22" fill="{{ $d(85, 70) }}" />
            <path d="M0 110 30 70 52 98 70 78 100 112V150H0z" fill="{{ $c(40, 9) }}" />
            <path d="M0 125 25 104 48 120 75 100 100 120V150H0z" fill="{{ $c(35, 5) }}" />
            @break
        @case(1) {{-- a figure in a doorway of light --}}
            <rect width="100" height="150" fill="{{ $c(40, 8) }}" />
            <rect x="30" y="28" width="40" height="92" rx="20" fill="{{ $d(80, 62, .85) }}" />
            <circle cx="50" cy="66" r="7" fill="{{ $c(40, 6) }}" />
            <path d="M38 120c0-24 5-40 12-40s12 16 12 40z" fill="{{ $c(40, 6) }}" />
            @break
        @case(2) {{-- a city at night --}}
            <rect width="100" height="150" fill="{{ $c(55, 22) }}" />
            <circle cx="74" cy="34" r="9" fill="{{ $d(60, 85, .9) }}" />
            <path d="M0 150V96h12V80h10v22h8V70h14v30h8V86h12v20h10V76h12v24h14v50z" fill="{{ $c(45, 7) }}" />
            <g fill="{{ $d(90, 75, .7) }}"><rect x="34" y="78" width="2" height="2" /><rect x="40" y="86" width="2" height="2" /><rect x="70" y="84" width="2" height="2" /><rect x="14" y="90" width="2" height="2" /><rect x="88" y="104" width="2" height="2" /></g>
            @break
        @case(3) {{-- a planet with a ring --}}
            <rect width="100" height="150" fill="{{ $c(50, 8) }}" />
            <g fill="{{ $d(30, 90, .7) }}"><circle cx="16" cy="20" r=".8" /><circle cx="80" cy="14" r="1" /><circle cx="62" cy="40" r=".7" /><circle cx="22" cy="104" r=".9" /><circle cx="86" cy="96" r=".8" /></g>
            <circle cx="50" cy="66" r="24" fill="{{ $c(70, 55) }}" />
            <ellipse cx="50" cy="66" rx="42" ry="9" fill="none" stroke="{{ $d(80, 75, .9) }}" stroke-width="3" transform="rotate(-18 50 66)" />
            @break
        @case(4) {{-- a face in profile, split light --}}
            <rect width="100" height="150" fill="{{ $d(70, 55) }}" />
            <rect x="50" width="50" height="150" fill="{{ $c(60, 25) }}" />
            <path d="M34 150c0-30 6-46 10-60-6-6-8-18-2-30 6-12 22-14 30-6 8 8 8 22 4 30l6 8-6 4c2 8 0 14-8 16 2 12 6 22 12 38z" fill="{{ $c(40, 7) }}" />
            @break
        @default {{-- waves under a big moon --}}
            <rect width="100" height="150" fill="{{ $c(60, 18) }}" />
            <circle cx="50" cy="48" r="26" fill="{{ $d(40, 88, .95) }}" />
            <path d="M0 96c12-6 22 6 34 0s22-6 34 0 22 6 32 0V150H0z" fill="{{ $c(65, 30) }}" />
            <path d="M0 110c12-6 22 6 34 0s22-6 34 0 22 6 32 0V150H0z" fill="{{ $c(60, 14) }}" />
    @endswitch
    <rect width="100" height="150" fill="url(#ag-poster-fade)" />
    <rect x="12" y="126" width="56" height="5" rx="2.5" fill="hsl(0 0% 100% / .85)" />
    <rect x="12" y="135" width="32" height="3" rx="1.5" fill="hsl(0 0% 100% / .45)" />
</svg>
