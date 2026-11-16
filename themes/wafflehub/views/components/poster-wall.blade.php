{{--
    The front page's poster wall: tilted columns of posters that drift slowly
    up and down behind the headline. The posters are drawn (components/poster:
    a waffle starring in six genres),
    or the images listed under Admin -> Settings -> Theme -> "Poster wall".
--}}
@php
    $images = array_values(array_filter(array_map('trim', preg_split('/\R/', (string) theme('poster_images', ''))),
        fn ($url) => preg_match('#^(https?://|/)\S+$#i', $url)));
    $hues = [268, 320, 230, 290, 200, 340, 250, 300];
    $columns = 7;
    $perColumn = 6;
@endphp
<div class="ag-wall" aria-hidden="true">
    <svg width="0" height="0" class="absolute">
        <defs>
            <linearGradient id="ag-poster-fade" x1="0" y1="0" x2="0" y2="1">
                <stop offset=".55" stop-color="#000" stop-opacity="0" />
                <stop offset="1" stop-color="#000" stop-opacity=".75" />
            </linearGradient>
            {{-- The waffle that stars in every drawn poster (components/poster). --}}
            <linearGradient id="ag-waffle-fill" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#f8be45" />
                <stop offset="1" stop-color="#c8681a" />
            </linearGradient>
            <symbol id="ag-waffle" viewBox="0 0 40 40">
                <rect x="1.5" y="1.5" width="37" height="37" rx="9" fill="url(#ag-waffle-fill)" stroke="#8a3f0c" stroke-width="1.4" />
                <g fill="#9a4a10" fill-opacity=".28">
                    <rect x="7" y="7" width="7" height="7" rx="2" /><rect x="16.5" y="7" width="7" height="7" rx="2" /><rect x="26" y="7" width="7" height="7" rx="2" />
                    <rect x="7" y="16.5" width="7" height="7" rx="2" /><rect x="16.5" y="16.5" width="7" height="7" rx="2" /><rect x="26" y="16.5" width="7" height="7" rx="2" />
                    <rect x="7" y="26" width="7" height="7" rx="2" /><rect x="16.5" y="26" width="7" height="7" rx="2" /><rect x="26" y="26" width="7" height="7" rx="2" />
                </g>
            </symbol>
        </defs>
    </svg>
    <div class="ag-wall-grid">
        @for ($col = 0; $col < $columns; $col++)
        <div class="ag-wall-col {{ $col % 2 ? 'ag-down' : 'ag-up' }}" style="--ag-speed: {{ 70 + ($col * 13) % 40 }}s">
            {{-- Twice the same posters, so the drift can loop without a jump. --}}
            @for ($copy = 0; $copy < 2; $copy++)
                @for ($row = 0; $row < $perColumn; $row++)
                    @php($n = $col * $perColumn + $row)
                    @if ($images)
                    <img src="{{ $images[$n % count($images)] }}" alt="" loading="lazy" referrerpolicy="no-referrer" class="ag-poster">
                    @else
                    <x-poster :v="($row * 5 + $col * 2) % 6" :h="$hues[($n * 3 + $col) % count($hues)]" />
                    @endif
                @endfor
            @endfor
        </div>
        @endfor
    </div>
    <div class="ag-wall-shade"></div>
</div>
