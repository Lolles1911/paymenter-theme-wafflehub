{{-- Afterglow: the neon button. Same behaviour as the default theme's. --}}
<button 
    {{ $attributes->merge(['class' => 'ag-button flex items-center gap-2 justify-center text-sm font-semibold py-2.5 lg:py-2 px-4.5 rounded-lg w-full cursor-pointer disabled:cursor-not-allowed disabled:opacity-50']) }}>
    @if (isset($type) && $type === 'submit')
        <div role="status" wire:loading>
            <x-ri-loader-5-fill aria-hidden="true" class="size-6 me-2 fill-current animate-spin" />
            <span class="sr-only">Loading...</span>
        </div>
        <div wire:loading.remove>
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</button>
