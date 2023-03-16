<nav class="nav-wrapper">
    <ul class="nav-grid">

        <li class="fit-content">

            <figure class="brand ps-md-4">
                <a href="{{ route('home') }}">
                    <h3>presto.it</h3>
                </a>
            </figure>

        </li>

        <ul class="nav-actions">
            @auth

                <li class="d-flex align-items-center justify-content-center" title="Inserisci Annuncio">
                    <a class="btn-custom px-lg-4" href="{{ route('announcementCreate') }}">Pubblica</a>
                </li>

                {{-- <li class="modal-wrapper d-flex align-items-center">

                    <input type="checkbox" class="modal-control" id="pubblica-checkbox" hidden>
                    <label for="pubblica-checkbox" class="modal-control">Pubblica</label>

                    <section class="modal-context  new-page bg-nav modal-publish ">
                        <label class="btn-x top-right-btn" for="pubblica-checkbox">X</label>
                        <livewire:create-announcement />
                    </section>

                </li> --}}


            @endauth

            <li class="dropdown-wrapper mx-md-2">
                <button class="dropdown-control btn-custom"> {{ __('messages.category') }} </button>
                <ul class="dropdown-context  ">
                    <li class="dropdown-action">
                        <a href="{{ route('announcementIndex') }}">Tutte</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="dropdown-action">
                            <a href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach


                </ul>
            </li>
            <li class="position-absolute start-0 mt-2 ms-1 d-500-none">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
            </li>

        </ul>

        <form action="{{ route('announcementSearch') }}" method="GET"
            class=" search-grid @if ($pageNav == 1) d-small-screen @endif ">
            <input type="serch" name="searched" class="cerca-annunci opacity70 opacity100-focus" placeholder="Cerca"
                aria-label="Search">
            <button class="opacity70 opacity100-focus search-btn" type="submit">🔍</button>
        </form>
        @if (((Auth::user() && !Auth::user()->is_revisor) || !Auth::user()) && $pageNav == 1)
            <div class="tooltip-wrapper d-lg-block d-sm-none">
                <a href="{{ route('becomeRevisor') }}" class="fa-solid fa-suitcase fa-2x tooltip-controller">
                </a>
                <div class="tooltip-context dropdown-context">
                    <a href="{{ route('becomeRevisor') }}" class=""> Lavora con noi!
                    </a>
                </div>
            </div>
        @endif
        <ul title="Utente" class="nav-user-ul grid-flow-row pe-md-2 pt-2">


            <li class="dropdown-wrapper wrapper-user-size">

                <button class="dropdown-controller d-md-flex flex-row flex-end " type="button" aria-expanded="false"
                    id="accessBtn">
                    <p class=" pe-md-2 position-relative">
                        @auth
                            {{ Auth::user()->name . '!' }}
                        @else
                            Pubblica
                        @endauth
                        <label for="accessBtn" class="">
                            <i class="fa-solid fa-user fa-2x ps-1 position-relative top-0"></i>
                        </label>
                    </p>


                </button>

                <ul class="dropdown-context">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-action">
                            @csrf
                            <button type="submit" class=""> logout</button>
                        </form>
                    @else
                        <li class="dropdown-action pe-0"><a href="{{ route('login') }}" class="">Benvenuto,
                                accedi!</a>
                        </li>
                        {{-- <li class="modal-wrapper d-flex align-items-center">

                            <input type="checkbox" class="modal-control" id="login-checkbox" hidden>
                            <label for="login-checkbox" class="modal-control">Accedi</label>

                            <section class="modal-context  new-page bg-nav modal-publish ">
                                <label class="btn-x top-right-btn" for="login-checkbox">X</label>
                                <x-login />
                            </section>

                        </li> --}}
                        <a href="{{ route('register') }}" class="">
                            <li class="dropdown-action">Registrati</li>
                        </a>
                    @endauth

                    {{-- ZONA REVISORE --}}
                    @auth
                        <li title="Zona Revisore"
                            class="dropdown-action 
                            @if ($navType == 'welcome' && !Auth::user()->is_revisor) d-md-none d-sm-block @endif">

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
                                <a href="{{ route('becomeRevisor') }}"
                                    class="
                                  
                                ">
                                    Lavora con noi!
                                </a>

                                {{-- <a href="{{ route('becomeRevisor') }}" class="d-lg-block d-sm-none"> Lavora con noi!
                                </a> --}}
                            @endif
                        </li>


                    @endauth
                    <li class="d-flex justify-content-around pb-lg-3">

                        <x-_locale lang="it" />
                        <x-_locale lang="en" />
                        <x-_locale lang="es" />


                    </li>
                </ul>
            </li>


        </ul>
    </ul>
</nav>
