{{--
    The front page's poster wall: tilted columns of posters that drift slowly
    up and down behind the headline. The posters are drawn (components/poster),
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
                    <x-poster :v="($n * 5 + $col) % 6" :h="$hues[($n * 3 + $col) % count($hues)]" />
                    @endif
                @endfor
            @endfor
        </div>
        @endfor
    </div>
    <div class="ag-wall-shade"></div>
</div>
