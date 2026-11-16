{{--
    The front page's poster wall: tilted columns of posters that drift slowly
    up and down behind the headline. The posters are WaffleHub's own waffle
    posters (public/wafflehub-art/posters), or the images listed under
    Admin -> Settings -> Theme -> "Poster wall".
--}}
@php
    $images = array_values(array_filter(array_map('trim', preg_split('/\R/', (string) theme('poster_images', ''))),
        fn ($url) => preg_match('#^(https?://|/)\S+$#i', $url)));
    if (!$images) {
        $images = array_map(fn ($name) => asset('wafflehub-art/posters/' . $name . '.webp'), [
            'astronaut', 'detective', 'cowboy', 'superhero', 'romance', 'horror', 'action', 'cinema', 'sad',
            'wizard', 'party', 'spy', 'emperor', 'soldier', 'explorer', 'dj', 'football', 'christmas',
        ]);
    }
    $columns = 7;
    $perColumn = 7;
@endphp
<div class="ag-wall" aria-hidden="true">
    <div class="ag-wall-grid">
        @for ($col = 0; $col < $columns; $col++)
        <div class="ag-wall-col {{ $col % 2 ? 'ag-down' : 'ag-up' }}" style="--ag-speed: {{ 70 + ($col * 13) % 40 }}s">
            {{-- Twice the same posters, so the drift can loop without a jump. --}}
            @for ($copy = 0; $copy < 2; $copy++)
                @for ($row = 0; $row < $perColumn; $row++)
                    {{-- Neighbours, also across columns, never show the same poster. --}}
                    <img src="{{ $images[($row * 5 + $col * 3) % count($images)] }}" alt="" loading="lazy" referrerpolicy="no-referrer" class="ag-poster">
                @endfor
            @endfor
        </div>
        @endfor
    </div>
    <div class="ag-wall-shade"></div>
</div>
