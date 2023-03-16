<nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">

        <a class="navbar-brand" href="/"> Presto.it </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"> Home </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">
                                    {{ $category->name }}
                                </a>
                            </li>

                            <li>
                                <hr class="dropdow-divider">
                            </li>
                        @endforeach
                    </ul>
                </li>


                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcementCreate') }}">Nuovo Annuncio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">

                            {{-- nel caso in cui non è loggato fai apparire questo --}}
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                    Logout
                                </a>
                            </li>


                        </ul>

                        <form id="form-logout" method="POST" action="{{ route('logout') }}" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}">Accedi</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('register') }}">Registrati</a></li>
                @endguest

            </ul>

            {{-- funzione che controlla se l'utente è autenticato --}}
            @auth
                <p>ciao, {{ Auth::user()->name }}</p>
            @else
                <p>ciao, accedi</p>
            @endauth

        </div>

    </div>

</nav>
