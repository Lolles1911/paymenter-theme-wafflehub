{{--
    WaffleHub colours. Dark only, so the same values apply with or without
    the "dark" class. Same variables as the default theme, plus
    --color-on-primary and --color-tertiary (a third tone).
--}}
@php
    $hsl = fn (string $key, string $fallback) => str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme($key, $fallback)));
@endphp
<style>
    :root, .dark {
        color-scheme: dark;
        --color-primary: {{ $hsl('night-primary', '266 85% 72%') }};
        --color-secondary: {{ $hsl('night-secondary', '325 80% 70%') }};
        --color-tertiary: {{ $hsl('night-tertiary', '230 70% 62%') }};
        --color-on-primary: {{ $hsl('night-on-primary', '252 60% 6%') }};
        --color-neutral: {{ $hsl('night-neutral', '252 28% 19%') }};
        --color-base: {{ $hsl('night-base', '240 40% 97%') }};
        --color-muted: {{ $hsl('night-muted', '248 20% 72%') }};
        --color-inverted: {{ $hsl('night-inverted', '252 45% 5%') }};
        --color-background: {{ $hsl('night-background', '252 45% 4%') }};
        --color-background-secondary: {{ $hsl('night-background-secondary', '252 38% 9%') }};

        --color-success: 152 65% 52%;
        --color-error: 355 85% 66%;
        --color-warning: 38 92% 60%;
        --color-inactive: 250 10% 60%;
        --color-info: 200 100% 64%;
    }
</style>
