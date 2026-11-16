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
    // Shuffled on every page view, keeping the same poster away from itself.
    // Each candidate gets a penalty for every copy nearby: in its own column
    // (which loops, so also across the seam) and up to two columns away,
    // more the closer it is. The least penalised, then least used, wins.
    $grid = [];
    $used = array_fill(0, count($images), 0);
    for ($col = 0; $col < $columns; $col++) {
        for ($row = 0; $row < $perColumn; $row++) {
            $penalty = array_fill(0, count($images), 0);
            for ($c = $col - 2; $c <= $col; $c++) {
                for ($r = 0; $r < $perColumn; $r++) {
                    if (!isset($grid[$c][$r]) || ($c === $col && $r === $row)) {
                        continue;
                    }
                    $rows = min(abs($r - $row), $perColumn - abs($r - $row));
                    $cols = $col - $c;
                    $penalty[$grid[$c][$r]] += max(0, 4 - $rows) * [100, 30, 8][$cols];
                }
            }
            $candidates = array_keys($images);
            shuffle($candidates);
            usort($candidates, fn ($a, $b) => ($penalty[$a] <=> $penalty[$b]) ?: ($used[$a] <=> $used[$b]));
            $grid[$col][$row] = $candidates[0];
            $used[$candidates[0]]++;
        }
    }
@endphp
<div class="ag-wall" aria-hidden="true">
    <div class="ag-wall-grid">
        @for ($col = 0; $col < $columns; $col++)
        <div class="ag-wall-col {{ $col % 2 ? 'ag-down' : 'ag-up' }}" style="--ag-speed: {{ 70 + ($col * 13) % 40 }}s">
            {{-- Twice the same posters, so the drift can loop without a jump. --}}
            @for ($copy = 0; $copy < 2; $copy++)
                @for ($row = 0; $row < $perColumn; $row++)
                    <img src="{{ $images[$grid[$col][$row]] }}" alt="" loading="lazy" referrerpolicy="no-referrer" class="ag-poster">
                @endfor
            @endfor
        </div>
        @endfor
    </div>
    <div class="ag-wall-shade"></div>
</div>
