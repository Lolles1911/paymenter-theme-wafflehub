{{--
    WaffleHub colours. Same variables as the default theme, plus
    --color-on-primary and --color-syrup-end. The fallbacks here are the
    WaffleHub palette, so the theme looks right before its settings are saved.
--}}
@php
    $hsl = fn (string $key, string $fallback) => str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme($key, $fallback)));
@endphp
<style>
    :root {
        --color-primary: {{ $hsl('primary', '26 85% 37%') }};
        --color-on-primary: {{ $hsl('on-primary', '0 0% 100%') }};
        --color-secondary: {{ $hsl('secondary', '40 92% 50%') }};
        --color-neutral: {{ $hsl('neutral', '35 35% 86%') }};
        --color-base: {{ $hsl('base', '24 35% 12%') }};
        --color-muted: {{ $hsl('muted', '25 12% 40%') }};
        --color-inverted: {{ $hsl('inverted', '40 60% 98%') }};
        --color-background: {{ $hsl('background', '40 60% 98%') }};
        --color-background-secondary: {{ $hsl('background-secondary', '38 50% 95%') }};
        --color-syrup-end: 14 75% 36%;

        --color-success: 142 71% 35%;
        --color-error: 0 72% 48%;
        --color-warning: 25 95% 43%;
        --color-inactive: 0 0% 55%;
        --color-info: 210 90% 45%;
    }

    .dark {
        --color-primary: {{ $hsl('dark-primary', '38 92% 56%') }};
        --color-on-primary: {{ $hsl('dark-on-primary', '24 40% 9%') }};
        --color-secondary: {{ $hsl('dark-secondary', '28 85% 52%') }};
        --color-neutral: {{ $hsl('dark-neutral', '25 14% 19%') }};
        --color-base: {{ $hsl('dark-base', '38 40% 94%') }};
        --color-muted: {{ $hsl('dark-muted', '30 10% 62%') }};
        --color-inverted: {{ $hsl('dark-inverted', '24 20% 8%') }};
        --color-background: {{ $hsl('dark-background', '24 18% 7%') }};
        --color-background-secondary: {{ $hsl('dark-background-secondary', '24 15% 10%') }};
        --color-syrup-end: 24 95% 62%;

        --color-success: 142 65% 48%;
        --color-error: 0 80% 64%;
        --color-warning: 30 95% 58%;
        --color-inactive: 0 0% 58%;
        --color-info: 210 100% 66%;
    }
</style>
