@php
    $footerMsg = '© 2022 Company, Inc ' . __('messages.allAnnouncements');
@endphp

<x-layoutour :$footerMsg h1="" customNav="true">

    <section class="d-flex justify-content-center bg-blue-green sticky-top welcome-search">
        <form action="{{ route('announcementSearch') }}" method="GET" class="">
            <input type="serch" name="searched" class="cerca-annunci opacity100-focus" placeholder="Cerca"
                aria-label="Search">
            <button class="btn search-btn-opacity" type="submit">🔍</button>
        </form>
    </section>

    <header class="container-fluid welcome-header">
        <h1>Presto.it</h1>
    </header>

    <nav class="d-flex justify-content-evenly">

        <li>
            <a href="{{ route('announcementIndex') }}">
                Tutti gli Annunci
            </a>
        </li>


        @foreach ($categories as $category)
            <li><a class="dropdown-item"
                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </nav>
    <nav class="welcome-nav">
        <ul class="custom-nav">

            @auth
                <li title="Inserisci Annuncio">
                    <a href="{{ route('announcementCreate') }}">Pubblica Annuncio</a>
                </li>

                {{-- ZONA REVISORE --}}
                @if (Auth::user()->is_revisor)
                    <li title="Zona Revisore">
                        <a class="btn position-relative" aria-current="page" href="{{ route('revisor.index') }}">

                            Zona revisore
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-night">
                                {{ App\Models\announcement::toBeRevisionedCount() }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </li>
                @endif
            @endauth

            <li title="Utente" class="dropdown d-flex align-items-center">
                <label for="accessBtn">
                    @guest
                        Login:
                    @else
                        Profilo:
                    @endguest
                </label>
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    id="accessBtn">
                    @auth
                        Ciao, {{ Auth::user()->name }}
                    @else
                        Pubblica un annuncio!
                    @endauth
                </button>

                <ul class="dropdown-menu">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class=" dropdown-item">
                            @csrf
                            <button type="submit" class=" btn text-black"> logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="dropdown-item">
                            <li>Benvenuto, accedi!</li>
                        </a>

                        <a href="{{ route('register') }}" class="dropdown-item">
                            <li>Registrati</li>
                        </a>
                    @endauth
                </ul>

            </li>
        </ul>

    </nav>
    <section class="container-fluid">

        @if (session('access-denied'))
            <p>{{ session('access-denied') }}</p>
        @endif

    </section>




    test card-row
    <section class="card-deck_single-row">

        @foreach ($announcements as $announcement)
            <x-announcementCard.mini-card :$announcement />
        @endforeach

    </section>



    <section class="hori-wrapper">

        @foreach ($announcements as $announcement)
            <x-announcementCard.horizard :$announcement />
        @endforeach

    </section>


</x-layout>
