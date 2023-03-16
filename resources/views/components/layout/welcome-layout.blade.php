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

    <form action="{{ route('announcementSearch') }}" method="GET" class="search-grid d-big-screen">

        <input type="serch" name="searched" class="cerca-annunci opacity100-focus" placeholder="Cerca Annunci"
            aria-label="Search">
        <button class="opacity70 opacity100-focus search-btn" type="submit">🔍</button>
    </form>

    <x-header />

    <x-nav />

    <x-messages.any-message />

    <main class="vaporwave-bg">
        {{ $slot }}
        <x-svg.hr />
    </main>




    <x-footer />

    @livewireScripts
</body>

</html>
