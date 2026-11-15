{{-- WaffleHub: the product page as two cards of the same height, the product and what it costs. Same data as the default theme's. --}}
@php($canBuy = $product->stock !== 0 && $product->price()->available)
<div class="container mt-14">
    <div class="mx-auto max-w-5xl grid gap-6 md:grid-cols-[1fr_20rem] items-start md:items-stretch">
        <div class="glass rounded-2xl overflow-hidden">
            @if ($product->image)
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                class="w-full max-h-80 object-cover object-center">
            @endif
            <div class="p-6 md:p-8">
                <a href="{{ route('category.show', ['category' => $category->slug ?? $category]) }}" wire:navigate
                    class="text-sm font-medium text-primary hover:underline">{{ $category->name ?? '' }}</a>
                <h1 class="mt-1 text-3xl md:text-4xl font-bold">{{ $product->name }}</h1>
                @if ($product->description)
                <article class="mt-5 prose dark:prose-invert max-w-none text-muted">
                    {!! $product->description !!}
                </article>
                @endif
            </div>
        </div>

        <aside class="glass rounded-2xl p-6 flex flex-col">
            @if ($product->stock === 0)
            <span class="self-start inline-block text-xs font-medium px-2.5 py-0.5 rounded-full bg-error/15 text-error mb-3">
                {{ __('product.out_of_stock', ['product' => $product->name]) }}
            </span>
            @elseif ($product->stock > 0)
            <span class="self-start inline-block text-xs font-medium px-2.5 py-0.5 rounded-full bg-success/15 text-success mb-3">
                {{ __('product.in_stock') }}
            </span>
            @endif
            <p class="text-3xl font-bold">{{ $product->price()->formatted->price }}</p>

            @if ($canBuy)
            <a href="{{ route('products.checkout', ['category' => $category, 'product' => $product->slug]) }}"
                wire:navigate class="block mt-6 md:mt-auto md:pt-6">
                <x-button.primary class="py-3!">
                    <x-ri-shopping-bag-4-fill class="size-5" />
                    {{ __('product.add_to_cart') }}
                </x-button.primary>
            </a>
            @endif
        </aside>
    </div>
</div>
