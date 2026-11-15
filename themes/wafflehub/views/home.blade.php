@php
    // An empty field means the default text, in the visitor's language (lang/).
    $title = theme('hero_title', '') ?: __('wafflehub::home.title', ['name' => config('app.name')]);
    // The shop's own name gets the accent gradient where it appears in the headline.
    $titleHtml = str_replace(e(config('app.name')), '<span class="text-glow">' . e(config('app.name')) . '</span>', e($title));
    $badge = theme('hero_badge', '') ?: __('wafflehub::home.badge');
    $button = theme('hero_button', '') ?: __('wafflehub::home.button');
    $text = theme('home_page_text', '') ?: e(__('wafflehub::home.text'));
    $markdown = ['allow_unsafe_links' => false, 'renderer' => ['soft_break' => '<br>']];
    // Set by the Paywarr (Wizarr) extension when only Discord members may see the shop.
    $shopLocked = app()->bound('wizarr.shopLocked') && app('wizarr.shopLocked');
@endphp
<div>
    {{-- Hero: the headline over a wall of posters --------------------------}}
    <section class="relative overflow-hidden ag-hero">
        <x-poster-wall />
        <div class="container relative pt-20 pb-24 md:pt-32 md:pb-36">
            <div class="max-w-2xl">
                @if ($badge)
                <span class="inline-flex items-center gap-2 rounded-full glass px-3.5 py-1.5 text-sm font-medium text-muted">
                    <span class="relative flex size-2">
                        <span class="relative inline-flex size-2 rounded-full bg-primary"></span>
                    </span>
                    {{ $badge }}
                </span>
                @endif

                <h1 class="mt-6 text-4xl sm:text-5xl lg:text-7xl font-bold leading-[1.02]">{!! $titleHtml !!}</h1>

                <div class="mt-6 max-w-xl text-lg leading-relaxed text-muted [&_a]:text-primary [&_a]:underline [&_p+p]:mt-3">
                    {!! Str::markdown($text, $markdown) !!}
                </div>

                <div class="mt-9 flex flex-wrap gap-3">
                    @if ($shopLocked)
                    <a href="{{ auth()->check() ? route('extensions.wizarr.discord') : route('login') }}" wire:navigate
                        class="ag-button inline-flex items-center gap-2 rounded-xl px-6 py-3.5 font-semibold">
                        {{ auth()->check() ? __('wafflehub::home.locked_connect') : __('wafflehub::home.locked_login') }}
                    </a>
                    @elseif ($categories->isNotEmpty())
                    <a href="#subscriptions" class="ag-button inline-flex items-center gap-2 rounded-xl px-6 py-3.5 font-semibold">
                        {{ $button }}
                        <x-ri-arrow-down-line class="size-5" />
                    </a>
                    @endif
                    @guest
                    <a href="{{ route('login') }}" wire:navigate
                        class="inline-flex items-center rounded-xl glass px-6 py-3.5 font-semibold hover:border-primary/50 transition">
                        {{ __('navigation.login') }}
                    </a>
                    @else
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="inline-flex items-center rounded-xl glass px-6 py-3.5 font-semibold hover:border-primary/50 transition">
                        {{ __('navigation.dashboard') }}
                    </a>
                    @endguest
                </div>
            </div>

        </div>
    </section>

    {{-- How it works --------------------------------------------------------}}
    @if (theme('show_steps', true))
    <section class="container py-10">
        <h2 class="text-2xl md:text-3xl font-bold">{{ __('wafflehub::home.steps_title') }}</h2>
        <ol class="mt-8 grid md:grid-cols-3 gap-5">
            @foreach ([
                ['icon' => 'ri-shopping-bag-3-line', 'title' => __('wafflehub::home.step1_title'), 'text' => __('wafflehub::home.step1_text')],
                ['icon' => 'ri-mail-open-line', 'title' => __('wafflehub::home.step2_title'), 'text' => __('wafflehub::home.step2_text')],
                ['icon' => 'ri-tv-2-line', 'title' => __('wafflehub::home.step3_title'), 'text' => __('wafflehub::home.step3_text')],
            ] as $i => $step)
            <li class="glass rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <span class="ag-icon">
                        <x-dynamic-component :component="$step['icon']" class="size-6" />
                    </span>
                    <span class="text-3xl font-bold text-muted/40">0{{ $i + 1 }}</span>
                </div>
                <h3 class="mt-5 text-lg font-semibold">{{ $step['title'] }}</h3>
                <p class="mt-1.5 text-muted">{{ $step['text'] }}</p>
            </li>
            @endforeach
        </ol>
    </section>
    @endif

    {{-- Products (hidden while the shop is for Discord members only) -------}}
    @if ($categories->isNotEmpty() && !$shopLocked)
    <section id="subscriptions" class="container py-10 scroll-mt-24">
        <h2 class="text-2xl md:text-3xl font-bold">{{ __('wafflehub::home.subscriptions') }}</h2>

        <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($categories as $category)
            <a href="{{ route('category.show', ['category' => $category->slug]) }}" wire:navigate
                class="ag-card group glass rounded-2xl overflow-hidden flex flex-col">
                @if ($category->image && !theme('small_images', false))
                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                    class="w-full aspect-[16/9] object-cover object-center">
                @endif
                <div class="p-6 flex flex-col grow">
                    <div class="flex items-center gap-3">
                        @if ($category->image && theme('small_images', false))
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="size-12 rounded-lg object-cover">
                        @endif
                        <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
                    </div>
                    @if (theme('show_category_description', true) && $category->description)
                    <article class="prose dark:prose-invert prose-sm mt-3 text-muted">
                        {!! $category->description !!}
                    </article>
                    @endif
                    <span class="mt-auto pt-6 inline-flex items-center gap-2 font-semibold text-primary">
                        {{ __('common.button.view_all') }}
                        <x-ri-arrow-right-line class="size-5 transition-transform group-hover:translate-x-1" />
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif

    {!! hook('pages.home') !!}
</div>
