{{-- WaffleHub: a category page. The heading across the top, the categories as a menu on the left, the products as cards. Same data as the default theme's. --}}
<div class="container mt-14">
    <header class="max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold">{{ $category->name }}</h1>
        @if ($category->description)
        <article class="mt-3 prose dark:prose-invert max-w-none text-muted">
            {!! $category->description !!}
        </article>
        @endif
    </header>

    <div class="mt-8 grid gap-6 md:grid-cols-[14rem_1fr] items-start">
        @if (count($categories) > 1)
        <nav class="glass rounded-2xl p-2 flex md:flex-col gap-1 overflow-x-auto">
            @foreach ($categories as $ccategory)
            <a href="{{ route('category.show', ['category' => $ccategory->slug]) }}" wire:navigate
                class="whitespace-nowrap rounded-xl px-3 py-2 text-sm font-semibold transition-colors {{ $category->id == $ccategory->id ? 'bg-primary/15 text-primary' : 'text-muted hover:text-base hover:bg-neutral/40' }}">
                {{ $ccategory->name }}
            </a>
            @endforeach
        </nav>
        @endif

        <div class="flex flex-col gap-6 {{ count($categories) > 1 ? '' : 'md:col-span-2' }}">
            @if (count($childCategories) >= 1)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($childCategories as $childCategory)
                <a href="{{ route('category.show', ['category' => $childCategory->slug]) }}" wire:navigate
                    class="ag-card group glass rounded-2xl overflow-hidden flex flex-col">
                    @if ($childCategory->image && !theme('small_images', false))
                    <img src="{{ Storage::url($childCategory->image) }}" alt="{{ $childCategory->name }}" class="w-full aspect-[16/9] object-cover">
                    @endif
                    <div class="p-5 flex flex-col grow">
                        <h2 class="text-xl font-bold">{{ $childCategory->name }}</h2>
                        @if (theme('show_category_description', true) && $childCategory->description)
                        <article class="mt-2 prose prose-sm dark:prose-invert text-muted">{!! $childCategory->description !!}</article>
                        @endif
                        <span class="mt-auto pt-4 inline-flex items-center gap-2 font-semibold text-primary">
                            {{ __('common.button.view') }}
                            <x-ri-arrow-right-line class="size-5 transition-transform group-hover:translate-x-1" />
                        </span>
                    </div>
                </a>
                @endforeach
            </div>
            @endif

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($products as $product)
                <div class="ag-card glass rounded-2xl overflow-hidden flex flex-col">
                    @if ($product->image && !theme('small_images', false))
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full aspect-[16/9] object-cover">
                    @endif
                    <div class="p-5 flex flex-col grow">
                        <div class="flex items-center gap-3">
                            @if ($product->image && theme('small_images', false))
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="size-12 rounded-lg object-cover">
                            @endif
                            <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                        </div>
                        <p class="mt-1 text-2xl font-bold">{{ $product->price()->formatted->price }}</p>
                        @if ($product->description)
                        <article class="mt-3 prose prose-sm dark:prose-invert text-muted line-clamp-4">{!! $product->description !!}</article>
                        @endif
                        <div class="mt-auto pt-5 flex items-center gap-2">
                            @if ($product->stock !== 0 && $product->price()->available && theme('direct_checkout', false))
                            <a href="{{ route('products.checkout', ['category' => $product->category, 'product' => $product->slug]) }}" wire:navigate class="grow">
                                <x-button.primary>{{ __('product.add_to_cart') }}</x-button.primary>
                            </a>
                            @else
                            <a href="{{ route('products.show', ['category' => $product->category, 'product' => $product->slug]) }}" wire:navigate class="grow">
                                <x-button.primary>{{ __('common.button.view') }}</x-button.primary>
                            </a>
                            @if ($product->stock !== 0 && $product->price()->available)
                            <a href="{{ route('products.checkout', ['category' => $category, 'product' => $product->slug]) }}" wire:navigate
                                class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg border border-neutral hover:border-primary/50 transition-colors"
                                title="{{ __('product.add_to_cart') }}">
                                <x-ri-shopping-bag-4-fill class="size-5" />
                            </a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
