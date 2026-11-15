{{-- Afterglow: copy of the default theme's layout; only the marked lines differ. --}}
<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(in_array(app()->getLocale(), config('app.rtl_locales'))) dir="rtl" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Paymenter') }}
        @isset($title)
        - {{ $title }}
        @endisset
    </title>
    @livewireStyles
    {{-- Afterglow: the JavaScript is the default theme's own build, so it always
         matches this Paymenter version. Only the stylesheet is Afterglow's. --}}
    @vite(['themes/default/js/app.js'], 'default')
    @vite(['themes/' . config('settings.theme') . '/css/app.css'], config('settings.theme'))
    @include('layouts.colors')

    @if (config('settings.favicon'))
    <link rel="icon" href="{{ Storage::url(config('settings.favicon')) }}">
    @else
    {{-- Afterglow: the Afterglow mark, until a favicon is uploaded under Settings. --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,{{ rawurlencode(view('components.afterglow-mark', ['attributes' => new \Illuminate\View\ComponentAttributeBag(['xmlns' => 'http://www.w3.org/2000/svg'])])->render()) }}">
    @endif
    @isset($title)
    <meta content="{{ isset($title) ? config('app.name', 'Paymenter') . ' - ' . $title : config('app.name', 'Paymenter') }}" property="og:title">
    <meta content="{{ isset($title) ? config('app.name', 'Paymenter') . ' - ' . $title : config('app.name', 'Paymenter') }}" name="title">
    @endisset
    @isset($description)
    <meta content="{{ $description }}" property="og:description">
    <meta content="{{ $description }}" name="description">
    @endisset
    @isset($image)
    <meta content="{{ $image }}" property="og:image">
    <meta content="{{ $image }}" name="image">
    @endisset

    <meta name="theme-color" content="{{ theme('background', 'hsl(252, 45%, 4%)') }}">

    {!! hook('head') !!}
</head>

{{-- Afterglow: dark only, so no light/dark switching; "theme" stays defined for anything that reads it. --}}
<body class="dark w-full bg-background text-base min-h-screen flex flex-col antialiased {{ theme('motion', true) ? 'ag-motion' : '' }}"
    x-cloak
    x-data="{ theme: 'dark', isDark: true }"
>
    {{-- Afterglow: the soft light behind every page. --}}
    <div class="ag-backdrop" aria-hidden="true"><span></span><span></span><span></span></div>
    {!! hook('body') !!}
    <x-navigation />
    <div class="w-full flex flex-grow">
        @if (isset($sidebar) && $sidebar)
        <x-navigation.sidebar title="$title" />
        @endif
        <div class="{{ (isset($sidebar) && $sidebar) ? 'md:ml-64 rtl:ml-0 rtl:md:mr-64' : '' }} flex flex-col flex-grow overflow-auto">
            <main class="mt-16 grow">
                {{ $slot }}
            </main>
            <x-notification />
            <x-confirmation />
            <div class="flex">
                <x-navigation.footer />
            </div>
        </div>
        <x-impersonating />
    </div>
    @livewireScriptConfig
    {!! hook('footer') !!}
</body>

</html>
