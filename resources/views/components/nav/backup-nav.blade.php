<nav class="nav-wrapper">
    <ul class="nav-grid">

        <li class="fit-content">

            <figure class="brand">
                <a href="{{ route('home') }}">
                    <h3>Presto.it</h3>
                </a>
            </figure>

        </li>

        <ul class="nav-actions">
            @auth

                {{-- <li title="Inserisci Annuncio">
                    <a href="{{ route('announcementCreate') }}">Pubblica</a>
                </li> --}}

                <li class="modal-wrapper d-flex align-items-center">

                    <input type="checkbox" class="modal-control" id="pubblica-checkbox" hidden>
                    <label for="pubblica-checkbox" class="modal-control">Pubblica</label>

                    <section class="modal-context  new-page p-5 bg-nav">
                        <label class="btn-x" for="pubblica-checkbox">X</label>
                        <livewire:create-announcement />
                    </section>

                </li>


            @endauth
            <li class="dropdown-wrapper category-drop">
                <button class="dropdown-control ps-4"> Categorie </button>
                <ul class="dropdown-context">
                    @foreach ($categories as $category)
                        <li class="dropdown-action">
                            <a href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>



        <form action="{{ route('announcementSearch') }}" method="GET"
            class=" @if ($pageNav == 1) d-small-screen @endif ">
            <input type="serch" name="searched" class="cerca-annunci opacity70 opacity100-focus" placeholder="Cerca"
                aria-label="Search">
            <button class="opacity70 opacity100-focus" type="submit">🔍</button>
        </form>



        <ul title="Utente" class="nav-user-ul grid-flow-row">



            <li class="dropdown-wrapper">
                <label for="accessBtn" class="avatar-nav">
                    <x-svg.user />
                </label>

                <button class="dropdown-controller" type="button" aria-expanded="false" id="accessBtn">
                    <p>
                        @auth
                            {{ Auth::user()->name . '!' }}
                        @else
                            Inizia a Pubblicare
                        @endauth
                    </p>
                </button>

                <ul class="dropdown-context">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class=" dropdown-action">
                            @csrf
                            <button type="submit" class=" btn text-black"> logout</button>
                        </form>
                    @else
                        <li class="dropdown-action"><a href="{{ route('login') }}" class="">Benvenuto, accedi!</a>
                        </li>


                        <a href="{{ route('register') }}" class="">
                            <li class="dropdown-action">Registrati</li>
                        </a>
                    @endauth
                    <li class=" dropdown-action">
                        <x-_locale lang="it" />
                        <x-_locale lang="es" />
                        <x-_locale lang="en" />
                    </li>

                </ul>
            </li>

            {{-- ZONA REVISORE --}}
            @auth
                <li title="Zona Revisore" class="revisor-area-nav">
                    @if (Auth::user()->is_revisor)
                        <a class="position-relative" aria-current="page" href="{{ route('revisor.index') }}">

                            Zona revisore
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-interactive">
                                {{ App\Models\announcement::toBeRevisionedCount() }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('becomeRevisor') }}" class="">Lavora con noi!</a>
                    @endif
                </li>
            @endauth
        </ul>
    </ul>
</nav>
<nav class="nav-wrapper">
    <ul class="nav-grid">

        <li class="fit-content">

            <figure class="brand">
                <a href="{{ route('home') }}">
                    <h3>Presto.it</h3>
                </a>
            </figure>

        </li>

        <ul class="nav-actions">
            @auth

                {{-- <li title="Inserisci Annuncio">
                    <a href="{{ route('announcementCreate') }}">Pubblica</a>
                </li> --}}

                <li class="modal-wrapper d-flex align-items-center">

                    <input type="checkbox" class="modal-control" id="pubblica-checkbox" hidden>
                    <label for="pubblica-checkbox" class="modal-control">Pubblica</label>

                    <section class="modal-context  new-page p-5 bg-nav">
                        <label class="btn-x" for="pubblica-checkbox">X</label>
                        <livewire:create-announcement />
                    </section>

                </li>


            @endauth
            <li class="dropdown-wrapper category-drop">
                <button class="dropdown-control ps-4"> Categorie </button>
                <ul class="dropdown-context">
                    @foreach ($categories as $category)
                        <li class="dropdown-action">
                            <a href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>



        <form action="{{ route('announcementSearch') }}" method="GET"
            class=" @if ($pageNav == 1) d-small-screen @endif ">
            <input type="serch" name="searched" class="cerca-annunci opacity70 opacity100-focus" placeholder="Cerca"
                aria-label="Search">
            <button class="opacity70 opacity100-focus" type="submit">🔍</button>
        </form>



        <ul title="Utente" class="nav-user-ul grid-flow-row">



            <li class="dropdown-wrapper">
                <label for="accessBtn" class="avatar-nav">
                    <x-svg.user />
                </label>

                <button class="dropdown-controller" type="button" aria-expanded="false" id="accessBtn">
                    <p>
                        @auth
                            {{ Auth::user()->name . '!' }}
                        @else
                            Inizia a Pubblicare
                        @endauth
                    </p>
                </button>

                <ul class="dropdown-context">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class=" dropdown-action">
                            @csrf
                            <button type="submit" class=" btn text-black"> logout</button>
                        </form>
                    @else
                        <li class="dropdown-action"><a href="{{ route('login') }}" class="">Benvenuto, accedi!</a>
                        </li>


                        <a href="{{ route('register') }}" class="">
                            <li class="dropdown-action">Registrati</li>
                        </a>
                    @endauth
                    <li class=" dropdown-action">
                        <x-_locale lang="it" />
                        <x-_locale lang="es" />
                        <x-_locale lang="en" />
                    </li>

                </ul>
            </li>

            {{-- ZONA REVISORE --}}
            @auth
                <li title="Zona Revisore" class="revisor-area-nav">
                    @if (Auth::user()->is_revisor)
                        <a class="position-relative" aria-current="page" href="{{ route('revisor.index') }}">

                            Zona revisore
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-interactive">
                                {{ App\Models\announcement::toBeRevisionedCount() }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('becomeRevisor') }}" class="">Lavora con noi!</a>
                    @endif
                </li>
            @endauth
        </ul>
    </ul>
</nav>
