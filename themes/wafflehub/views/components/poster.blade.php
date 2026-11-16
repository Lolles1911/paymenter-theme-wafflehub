{{--
    A drawn movie poster for the poster wall: a waffle starring in one of six
    genres ($v, 0-5), with the background in one hue ($h, 0-360) and two title
    bars at the bottom. No text, no images, so it costs nothing to load.
    The waffle itself is the symbol #ag-waffle in components/poster-wall.
--}}
@props(['v' => 0, 'h' => 270])
@php
    $c = fn (int $s, int $l, float $a = 1) => "hsl($h $s% $l% / $a)";
    $d = fn (int $s, int $l, float $a = 1) => 'hsl(' . (($h + 40) % 360) . " $s% $l% / $a)";
    // A face on a waffle centred at ($x, $y), $s wide.
    $face = function (float $x, float $y, float $s, string $mood) {
        $ex = $s * 0.18; $ey = $y - $s * 0.06; $r = $s * 0.065; $ink = '#3b1a06';
        $eyes = match ($mood) {
            'scared' => "<circle cx='" . ($x - $ex) . "' cy='$ey' r='" . ($r * 1.7) . "' fill='#fff'/><circle cx='" . ($x + $ex) . "' cy='$ey' r='" . ($r * 1.7) . "' fill='#fff'/><circle cx='" . ($x - $ex) . "' cy='$ey' r='" . ($r * .8) . "' fill='$ink'/><circle cx='" . ($x + $ex) . "' cy='$ey' r='" . ($r * .8) . "' fill='$ink'/>",
            'squint' => "<path d='M" . ($x - $ex - $r * 1.4) . " $ey h" . ($r * 2.8) . "M" . ($x + $ex - $r * 1.4) . " $ey h" . ($r * 2.8) . "' stroke='$ink' stroke-width='" . ($r * .9) . "' stroke-linecap='round'/>",
            'side' => "<circle cx='" . ($x - $ex) . "' cy='$ey' r='" . ($r * 1.4) . "' fill='#fff'/><circle cx='" . ($x + $ex) . "' cy='$ey' r='" . ($r * 1.4) . "' fill='#fff'/><circle cx='" . ($x - $ex + $r * .6) . "' cy='$ey' r='" . ($r * .75) . "' fill='$ink'/><circle cx='" . ($x + $ex + $r * .6) . "' cy='$ey' r='" . ($r * .75) . "' fill='$ink'/>",
            default => "<circle cx='" . ($x - $ex) . "' cy='$ey' r='$r' fill='$ink'/><circle cx='" . ($x + $ex) . "' cy='$ey' r='$r' fill='$ink'/>",
        };
        $my = $y + $s * 0.14; $mw = $s * 0.16;
        $mouth = match ($mood) {
            'scared' => "<ellipse cx='$x' cy='" . ($my + $r * .4) . "' rx='" . ($r * 1.2) . "' ry='" . ($r * 1.7) . "' fill='$ink'/>",
            'squint', 'side' => "<path d='M" . ($x - $mw * .7) . " $my q" . ($mw * .7) . " " . ($r * .8) . " " . ($mw * 1.4) . " -" . ($r * .6) . "' fill='none' stroke='$ink' stroke-width='" . ($r * .7) . "' stroke-linecap='round'/>",
            default => "<path d='M" . ($x - $mw) . " $my q$mw " . ($r * 2.4) . " " . ($mw * 2) . " 0' fill='none' stroke='$ink' stroke-width='" . ($r * .75) . "' stroke-linecap='round'/>",
        };
        $blush = $mood === 'love' ? "<circle cx='" . ($x - $ex * 1.7) . "' cy='" . ($my - $r) . "' r='" . ($r * 1.3) . "' fill='#ff6b9a' opacity='.55'/><circle cx='" . ($x + $ex * 1.7) . "' cy='" . ($my - $r) . "' r='" . ($r * 1.3) . "' fill='#ff6b9a' opacity='.55'/>" : '';

        return $eyes . $mouth . $blush;
    };
@endphp
<svg viewBox="0 0 100 150" preserveAspectRatio="xMidYMid slice" aria-hidden="true" {{ $attributes->merge(['class' => 'ag-poster']) }}>
    @switch($v % 6)
        @case(0) {{-- Waffles in space: an astronaut waffle in front of a ringed planet --}}
            <rect width="100" height="150" fill="{{ $c(55, 9) }}" />
            <g fill="#fff" opacity=".7"><circle cx="12" cy="14" r=".9" /><circle cx="86" cy="22" r="1.1" /><circle cx="70" cy="8" r=".7" /><circle cx="20" cy="96" r=".8" /><circle cx="90" cy="88" r=".9" /><circle cx="40" cy="20" r=".6" /></g>
            <circle cx="76" cy="34" r="16" fill="{{ $d(70, 55) }}" />
            <ellipse cx="76" cy="34" rx="27" ry="6" fill="none" stroke="{{ $d(80, 78, .8) }}" stroke-width="2.4" transform="rotate(-20 76 34)" />
            <g transform="rotate(-10 48 74)">
                <use href="#ag-waffle" x="28" y="54" width="40" height="40" />
                {!! $face(48, 74, 40, 'happy') !!}
                <circle cx="48" cy="74" r="25" fill="hsl(0 0% 100% / .08)" stroke="hsl(0 0% 100% / .6)" stroke-width="1.6" />
                <path d="M33 62a17 17 0 0 1 10-7" stroke="#fff" stroke-width="2" stroke-linecap="round" opacity=".7" fill="none" />
            </g>
            @break
        @case(1) {{-- A haunted night: a scared waffle under the full moon --}}
            <rect width="100" height="150" fill="{{ $c(35, 7) }}" />
            <circle cx="64" cy="34" r="20" fill="{{ $d(30, 86, .9) }}" />
            <path d="M8 120c4-30 2-56 10-76m-4 30-12-10m14-24 8-10" stroke="{{ $c(30, 3) }}" stroke-width="3.5" stroke-linecap="round" fill="none" />
            <path d="M70 58c8 0 13 6 13 14v20l-4-3-4 4-5-4-5 4-4-4-4 3V72c0-8 6-14 13-14z" fill="hsl(0 0% 100% / .85)" />
            <circle cx="66" cy="72" r="1.8" fill="{{ $c(35, 7) }}" /><circle cx="74" cy="72" r="1.8" fill="{{ $c(35, 7) }}" />
            <use href="#ag-waffle" x="22" y="74" width="38" height="38" />
            {!! $face(41, 93, 38, 'scared') !!}
            <path d="M0 128h100v22H0z" fill="{{ $c(30, 4) }}" />
            @break
        @case(2) {{-- A romance: two waffles in love --}}
            <rect width="100" height="150" fill="{{ $d(65, 40) }}" />
            <path d="M50 108C20 88 14 66 26 54c9-9 20-5 24 4 4-9 15-13 24-4 12 12 6 34-24 54z" fill="{{ $c(80, 70, .55) }}" />
            <g transform="rotate(-12 34 82)"><use href="#ag-waffle" x="18" y="66" width="32" height="32" />{!! $face(34, 82, 32, 'love') !!}</g>
            <g transform="rotate(12 66 82)"><use href="#ag-waffle" x="50" y="66" width="32" height="32" />{!! $face(66, 82, 32, 'love') !!}</g>
            <path d="M50 52c-3-4-9-2-7 3l7 7 7-7c2-5-4-7-7-3z" fill="#ff6b9a" />
            @break
        @case(3) {{-- A superhero: a masked waffle with a cape --}}
            <rect width="100" height="150" fill="{{ $c(70, 30) }}" />
            <g fill="{{ $d(90, 65, .35) }}"><path d="M50 72 0 20h22zM50 72 100 20H78zM50 72 0 110v-24zM50 72l50 38V86zM50 72 34 0h32z" /></g>
            <path d="M34 66 14 118l36-12 36 12-20-52z" fill="#e23b4e" />
            <use href="#ag-waffle" x="28" y="50" width="44" height="44" />
            <path d="M33 66c6-3 28-3 34 0v6c-6 3-28 3-34 0z" fill="#1f1235" />
            <circle cx="42" cy="69" r="2.4" fill="#fff" /><circle cx="58" cy="69" r="2.4" fill="#fff" />
            <path d="M42 80q8 5 16 0" fill="none" stroke="#3b1a06" stroke-width="2.4" stroke-linecap="round" />
            @break
        @case(4) {{-- A western: a cowboy waffle at sundown --}}
            <rect width="100" height="150" fill="{{ $d(80, 58) }}" />
            <rect y="60" width="100" height="90" fill="{{ $c(70, 45, .6) }}" />
            <circle cx="50" cy="66" r="24" fill="#ffd166" opacity=".9" />
            <path d="M0 104h100v46H0z" fill="{{ $c(45, 22) }}" />
            <path d="M12 104V78c0-4 6-4 6 0v26m0-14h5v-8c0-3 4-3 4 0v12h-9m-6-4H7V80c0-3-4-3-4 0v12h9M84 104V84c0-3 5-3 5 0v20" stroke="{{ $c(40, 14) }}" stroke-width="4" stroke-linecap="round" fill="none" />
            <use href="#ag-waffle" x="30" y="70" width="40" height="40" />
            {!! $face(50, 90, 40, 'squint') !!}
            <path d="M24 72c6 3 46 3 52 0-4 5-48 5-52 0z" fill="#7a4317" />
            <path d="M36 72c0-12 4-16 14-16s14 4 14 16z" fill="#8f5220" />
            <path d="M36 68h28" stroke="#5a2e0e" stroke-width="2.5" />
            @break
        @default {{-- A detective story: a waffle in a fedora with a magnifying glass, in the rain --}}
            <rect width="100" height="150" fill="{{ $c(45, 12) }}" />
            <path d="M74 20v100" stroke="{{ $c(20, 30) }}" stroke-width="2.5" />
            <path d="M68 20h12" stroke="{{ $c(20, 30) }}" stroke-width="3" stroke-linecap="round" />
            <path d="M74 24 52 130h56z" fill="{{ $d(80, 80, .12) }}" />
            <g stroke="hsl(0 0% 100% / .25)" stroke-width=".8"><path d="M10 10l-4 12M30 30l-4 12M58 12l-4 12M88 44l-4 12M18 60l-4 12M92 96l-4 12M40 4l-4 12" /></g>
            <use href="#ag-waffle" x="24" y="72" width="40" height="40" />
            {!! $face(44, 92, 40, 'side') !!}
            <path d="M17 76c8 3 46 3 54 0-4 4-50 4-54 0z" fill="#2a2440" />
            <path d="M28 76c0-10 6-14 16-14s16 4 16 14z" fill="#3a3358" />
            <path d="M28 72h32" stroke="#1a1530" stroke-width="2.5" />
            <circle cx="70" cy="104" r="7" fill="hsl(0 0% 100% / .15)" stroke="#d9d4ea" stroke-width="2.2" />
            <path d="M65 109l-6 7" stroke="#8f5220" stroke-width="3" stroke-linecap="round" />
    @endswitch
    <rect width="100" height="150" fill="url(#ag-poster-fade)" />
    <rect x="12" y="126" width="56" height="5" rx="2.5" fill="hsl(0 0% 100% / .85)" />
    <rect x="12" y="135" width="32" height="3" rx="1.5" fill="hsl(0 0% 100% / .45)" />
</svg>
