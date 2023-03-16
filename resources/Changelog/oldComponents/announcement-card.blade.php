{{-- TODO card cliccabile --}}
{{-- Tutte le card hanno accesso a una variabile interna $announcement di tipo Announcement --}}
<article class="card-custom shadow">

    <figure>
        <img src="https://picsum.photos/200" alt="...">
    </figure>


    <section title="Titolo" class="padded-card">
        <h4>
            {{ $announcement->title }}
        </h4>
    </section>

    <section title="Descrizione" class="padded-card">

        <p class="long-description">
            {{ $announcement->body }}
        </p>
        <p>
            {{ $announcement->price }}
        </p>



    </section>

    <section class="card-controls">
        <a class="btn shadow" href="{{ route('announcementShow', compact('announcement')) }}">Info
        </a>

        @if ($announcement->category)
            <a id="categoryBtn" class="btn shadow"
                href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
            </a>
        @endif

    </section>

    <section title="Informazioni aggiuntive" class="card-info">
        <p>
            Pubblicato il {{ $announcement->created_at->format('d/m/Y') }}
            @if ($announcement->user)
                da {{ $announcement->user->name }}
            @endif
        </p>
    </section>
</article>
