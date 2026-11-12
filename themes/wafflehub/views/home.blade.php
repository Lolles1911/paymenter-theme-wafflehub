@php
    // An empty field means the default text, in the visitor's language (lang/).
    $title = theme('hero_title', '') ?: __('wafflehub::home.title', ['name' => config('app.name')]);
    // Give the shop's own name the brand gradient where it appears in the headline.
    $titleHtml = str_replace(e(config('app.name')), '<span class="text-syrup">' . e(config('app.name')) . '</span>', e($title));
    $badge = theme('hero_badge', '') ?: __('wafflehub::home.badge');
    $button = theme('hero_button', '') ?: __('wafflehub::home.button');
    $text = theme('home_page_text', '') ?: e(__('wafflehub::home.text'));
    $markdown = ['allow_unsafe_links' => false, 'renderer' => ['soft_break' => '<br>']];
    // Set by the Wizarr extension when only Discord members may see the shop.
    $shopLocked = app()->bound('wizarr.shopLocked') && app('wizarr.shopLocked');
@endphp
<div>
    {{-- Hero ----------------------------------------------------------------}}
    <section class="relative overflow-hidden border-b border-neutral">
        <div class="absolute inset-0 waffle-grid" aria-hidden="true"></div>
        <div class="absolute inset-0 syrup-glow" aria-hidden="true"></div>

        <div class="container relative py-16 md:py-24 grid md:grid-cols-[1.25fr_0.75fr] gap-10 md:gap-16 items-center">
            <div>
                @if ($badge)
                <span class="inline-flex items-center gap-2 rounded-full border border-neutral bg-background/70 backdrop-blur px-3 py-1 text-sm font-medium text-muted">
                    <span class="size-2 rounded-full bg-primary"></span>
                    {{ $badge }}
                </span>
                @endif

                <h1 class="mt-5 text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.05]">{!! $titleHtml !!}</h1>

                <div class="mt-5 max-w-xl text-lg leading-relaxed text-muted [&_a]:text-primary [&_a]:underline [&_p+p]:mt-3">
                    {!! Str::markdown($text, $markdown) !!}
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
                    @if ($shopLocked)
                    <a href="{{ auth()->check() ? route('extensions.wizarr.discord') : route('login') }}" wire:navigate
                        class="inline-flex items-center gap-2 rounded-lg bg-primary text-on-primary px-6 py-3 font-semibold shadow-lg shadow-primary/20 hover:bg-primary/90 transition-colors">
                        {{ auth()->check() ? __('wafflehub::home.locked_connect') : __('wafflehub::home.locked_login') }}
                    </a>
                    @elseif ($categories->isNotEmpty())
                    <a href="#subscriptions"
                        class="inline-flex items-center gap-2 rounded-lg bg-primary text-on-primary px-6 py-3 font-semibold shadow-lg shadow-primary/20 hover:bg-primary/90 transition-colors">
                        {{ $button }}
                        <x-ri-arrow-down-line class="size-5" />
                    </a>
                    @endif
                    @guest
                    <a href="{{ route('login') }}" wire:navigate
                        class="inline-flex items-center rounded-lg border border-neutral bg-background/70 px-6 py-3 font-semibold hover:border-primary transition-colors">
                        {{ __('navigation.login') }}
                    </a>
                    @else
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="inline-flex items-center rounded-lg border border-neutral bg-background/70 px-6 py-3 font-semibold hover:border-primary transition-colors">
                        {{ __('navigation.dashboard') }}
                    </a>
                    @endguest
                </div>
            </div>

            <div class="hidden md:flex justify-center" aria-hidden="true">
                <div class="relative">
                    <div class="absolute -inset-10 rounded-full bg-secondary/25 blur-3xl"></div>
                    <x-waffle-mark class="relative w-64 lg:w-72 rotate-6 drop-shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    {{-- How it works --------------------------------------------------------}}
    @if (theme('show_steps', true))
    <section class="container py-14">
        <h2 class="text-2xl font-bold">{{ __('wafflehub::home.steps_title') }}</h2>
        <ol class="mt-6 grid md:grid-cols-3 gap-5">
            @foreach ([
                ['icon' => 'ri-shopping-bag-3-line', 'title' => __('wafflehub::home.step1_title'), 'text' => __('wafflehub::home.step1_text')],
                ['icon' => 'ri-mail-open-line', 'title' => __('wafflehub::home.step2_title'), 'text' => __('wafflehub::home.step2_text')],
                ['icon' => 'ri-tv-2-line', 'title' => __('wafflehub::home.step3_title'), 'text' => __('wafflehub::home.step3_text')],
            ] as $i => $step)
            <li class="card p-6 flex gap-4">
                <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                    <x-dynamic-component :component="$step['icon']" class="size-6" />
                </span>
                <div>
                    <p class="text-sm font-semibold text-muted">{{ $i + 1 }}.</p>
                    <h3 class="text-lg font-semibold">{{ $step['title'] }}</h3>
                    <p class="mt-1 text-muted">{{ $step['text'] }}</p>
                </div>
            </li>
            @endforeach
        </ol>
    </section>
    @endif

    {{-- Products (hidden while the shop is for Discord members only) -------}}
    @if ($categories->isNotEmpty() && !$shopLocked)
    <section id="subscriptions" class="container py-6 scroll-mt-24">
        <h2 class="text-2xl font-bold">{{ __('wafflehub::home.subscriptions') }}</h2>

        <div class="mt-6 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($categories as $category)
            <div class="group card overflow-hidden flex flex-col hover:border-primary/60 transition-colors">
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
                    <a href="{{ route('category.show', ['category' => $category->slug]) }}" wire:navigate class="mt-auto pt-5">
                        <x-button.primary>
                            {{ __('common.button.view_all') }}
                            <x-ri-arrow-right-fill class="size-5 transition-transform group-hover:translate-x-0.5" />
                        </x-button.primary>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {!! hook('pages.home') !!}
</div>
