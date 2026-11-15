@php
$lightLogo = config('settings.logo');
$darkLogo = config('settings.logo_dark');
@endphp

{{-- Afterglow is dark only: the dark logo first, else the light one. --}}
@if ($darkLogo || $lightLogo)
<img src="{{ Storage::url($darkLogo ?: $lightLogo) }}" alt="{{ config('app.name') }}" {{ $attributes->merge(['class' => 'w-auto inline-block']) }}>
@else
{{-- No logo uploaded under Settings: the neon mark. --}}
<x-afterglow-mark {{ $attributes->merge(['class' => 'w-auto aspect-square inline-block shrink-0 ag-mark']) }} />
@endif
