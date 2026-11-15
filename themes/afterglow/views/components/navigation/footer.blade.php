<footer class="ag-footer w-full mt-24">
    <div class="container py-12">
        <div class="flex flex-col md:flex-row justify-between gap-8 md:items-center">
            <div class="flex flex-col gap-4 items-start">
                <a href="{{ route('home') }}" class="flex flex-row items-center gap-2.5" wire:navigate>
                    <x-logo class="h-9" />
                    @if(theme('logo_display', 'logo-and-name') != 'logo-only')
                    <span class="text-xl font-bold leading-none">{{ config('app.name') }}</span>
                    @endif
                </a>
                <p class="text-sm text-muted">
                    {{ __('© :year :app_name. | All rights reserved.', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
                </p>
            </div>
            {{-- Paymenter is free and open source; the default theme asks to keep this link, and so does this one. --}}
            <a class="self-start md:self-auto border border-neutral bg-background/60 px-3 py-2 rounded-lg transition-colors flex items-center gap-2 text-muted hover:text-base hover:border-primary/60" href="https://paymenter.org" target="_blank" rel="noopener">
                <span class="text-sm font-medium tracking-tight">{{ __('Powered by') }}</span>
                <span class="text-sm font-semibold">Paymenter</span>
            </a>
        </div>
    </div>
</footer>
