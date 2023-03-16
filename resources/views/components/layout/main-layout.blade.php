<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Presto.it' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-main text-main normal-fs">

    <x-nav />

    <x-header />

    <x-messages.any-message />

    <main>
        {{ $slot }}
    </main>
    <x-svg.hr />
    <x-footer />

    @livewireScripts
</body>

</html>
