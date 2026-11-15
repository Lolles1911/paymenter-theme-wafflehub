{{-- WaffleHub mark: a waffle whose middle pocket is a play button. --}}
<svg viewBox="0 0 64 64" fill="none" role="img" aria-label="{{ config('app.name') }}" {{ $attributes }}>
    <defs>
        <linearGradient id="wafflehub-mark" x1="6" y1="4" x2="58" y2="62" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#F8BE45" />
            <stop offset="1" stop-color="#C2600F" />
        </linearGradient>
    </defs>
    <rect x="2" y="2" width="60" height="60" rx="16" fill="url(#wafflehub-mark)" />
    <g fill="#7A350A" fill-opacity=".32">
        <rect x="10" y="10" width="13" height="13" rx="3.5" />
        <rect x="25.5" y="10" width="13" height="13" rx="3.5" />
        <rect x="41" y="10" width="13" height="13" rx="3.5" />
        <rect x="10" y="25.5" width="13" height="13" rx="3.5" />
        <rect x="41" y="25.5" width="13" height="13" rx="3.5" />
        <rect x="10" y="41" width="13" height="13" rx="3.5" />
        <rect x="25.5" y="41" width="13" height="13" rx="3.5" />
        <rect x="41" y="41" width="13" height="13" rx="3.5" />
    </g>
    <path d="M28.6 27v10c0 .8.9 1.3 1.6.9l7.9-5c.6-.4.6-1.3 0-1.7l-7.9-5c-.7-.5-1.6 0-1.6.8z" fill="#FFF7E8" />
</svg>
