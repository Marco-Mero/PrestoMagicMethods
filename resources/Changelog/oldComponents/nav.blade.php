@if (!$customNav)
    <nav class="nav-container">

        <ul class="custom-nav">

            <li>
                <a href="{{ route('home') }}">
                    <figure class="brand">
                        <h3>Presto.it</h3>
                    </figure>
                </a>
            </li>

            <li>
                <a href="{{ route('announcementIndex') }}">
                    Tutti gli Annunci
                </a>
            </li>

            <li title="Filtro Categorie" class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </button>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
            </li>

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


            <li title="Cerca Annunci" class="w-100">
                <form action="{{ route('announcementSearch') }}" method="GET" class="search-grid">
                    <input type="serch" name="searched" class="cerca-annunci opacity100-focus" placeholder="Cerca"
                        aria-label="Search">
                    <button class="btn opacity70 opacity100-focus" type="submit">🔍</button>
                </form>
            </li>

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
                        Inizia a Pubblicare
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
                    <li>
                        <x-_locale lang="it" />
                        <x-_locale lang="es" />
                        <x-_locale lang="en" />
                    </li>

                </ul>

            </li>
        </ul>
    </nav>
@endif
