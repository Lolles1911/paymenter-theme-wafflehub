{{-- Afterglow's mark: a sun setting behind the horizon. Used when no logo is uploaded. --}}
<svg viewBox="0 0 64 64" fill="none" {{ $attributes }}>
    <defs>
        <linearGradient id="ag-sun" x1="0" y1="10" x2="0" y2="50" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#f9a8d4" />
            <stop offset="1" stop-color="#a78bfa" />
        </linearGradient>
        <linearGradient id="ag-line" x1="6" y1="0" x2="58" y2="0" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#a78bfa" />
            <stop offset="1" stop-color="#f9a8d4" />
        </linearGradient>
        <clipPath id="ag-cut">
            <path d="M0 0h64v31H0zM0 34h64v4H0zM0 41h64v3H0zM0 47h64v2H0z" />
        </clipPath>
    </defs>
    <rect x="1.5" y="1.5" width="61" height="61" rx="16" fill="#0b0716" stroke="#2a2342" stroke-width="2" />
    <circle cx="32" cy="34" r="19" fill="url(#ag-sun)" clip-path="url(#ag-cut)" />
    <path d="M10 51.5h44" stroke="url(#ag-line)" stroke-width="3" stroke-linecap="round" />
</svg>
