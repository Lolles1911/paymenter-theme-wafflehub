{{--
    Afterglow colours. Dark only, so the same values apply with or without
    the "dark" class. Same variables as the default theme, plus
    --color-on-primary and --color-tertiary (the middle of the neon gradient).
--}}
@php
    $hsl = fn (string $key, string $fallback) => str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme($key, $fallback)));
@endphp
<style>
    :root, .dark {
        color-scheme: dark;
        --color-primary: {{ $hsl('primary', '318 100% 64%') }};
        --color-secondary: {{ $hsl('secondary', '188 100% 52%') }};
        --color-tertiary: {{ $hsl('tertiary', '266 92% 68%') }};
        --color-on-primary: {{ $hsl('on-primary', '252 60% 6%') }};
        --color-neutral: {{ $hsl('neutral', '252 28% 19%') }};
        --color-base: {{ $hsl('base', '240 40% 97%') }};
        --color-muted: {{ $hsl('muted', '248 20% 72%') }};
        --color-inverted: {{ $hsl('inverted', '252 45% 5%') }};
        --color-background: {{ $hsl('background', '252 45% 4%') }};
        --color-background-secondary: {{ $hsl('background-secondary', '252 38% 9%') }};

        --color-success: 152 90% 55%;
        --color-error: 350 100% 66%;
        --color-warning: 40 100% 60%;
        --color-inactive: 250 10% 60%;
        --color-info: 200 100% 64%;
    }
</style>
