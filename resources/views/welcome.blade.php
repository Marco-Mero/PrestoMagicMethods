@php
    $footerMsg = '© 2022 Company, Inc ' . __('messages.allAnnouncements');
@endphp

<x-layoutour layoutType="welcome" headerType="welcome" navType="welcome" pageNav="1" footerType="prova" :$footerMsg>

    <section class="container-fluid">

        @if (session('access-denied'))
            <p>{{ session('access-denied') }}</p>
        @endif

    </section>

    {{-- categorie --}}
    <ul class="category-nav">
        @foreach ($categories as $category)
            <li class="d-big-screen bigger-fs text-center">
                <a href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
            </li>
        @endforeach

    </ul>

    <x-svg.hrnav />

    <section class="hori-wrapper">

        @foreach ($announcements as $announcement)
            <x-announcementCard :$announcement />
        @endforeach

    </section>


    </x-layout>
