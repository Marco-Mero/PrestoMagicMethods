{{-- TODO card cliccabile --}}
{{-- Tutte le card hanno accesso a una variabile interna $announcement di tipo Announcement --}}
<article class="mini-card 
@if ($announcement->category) mini-{{ $announcement->category->name }} @endif">

    <figure class="inherit-size">
        <img src="https://picsum.photos/200" alt="...">
    </figure>

    <section title="Descrizione" class="inherit-size grid-flow-row position-relative">

        <h4 class="mini-legible-text d-flex align-items-center justify-content-center">
            {{ $announcement->title }}
        </h4>

        <p title="Descrizione" class="mini-legible-text">
            Descrizione: {{ $announcement->body }}
        </p>

        <p class="mini-legible-text text-end pe-3">
            Prezzo: {{ $announcement->price }}
        </p>

        <section title="card-info" class="mini-legible-text">

            <a class="btn" href="{{ route('announcementShow', compact('announcement')) }}">Info
            </a>

            @if ($announcement->category)
                <a class="btn" id="categoryBtn" class=""
                    href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
                </a>
            @endif
            
            <p title="Informazioni aggiuntive">
            Pubblicato il {{ $announcement->created_at->format('d/m/Y') }}
            @if($announcement->user) 
            da {{ $announcement->user->name }} 
            @endif
            </p>

            @if (Auth::user() && Auth::user()->is_revisor)
                <section title="revisor-controls" class="d-flex justify-content-around">
                    <a class="btn bg-success" href=""> V </a>
                    <a class="btn bg-danger" href=""> X </a>
                </section>
            @endif

        </section>



    </section>


</article>
