{{-- TODO card cliccabile --}}
{{-- Tutte le card hanno accesso a una variabile interna $announcement di tipo Announcement --}}
<section class="col-12 col-md-4 my-4">

    <article class="card shadow">

        <img src="https://picsum.photos/200" class="card-img-top" alt="...">

        <section title="Titolo" class="card-header d-flex align-items-center justify-content-center">
            <h4 class="card-title">
                {{ $announcement->title }}
            </h4>
        </section>


        <section title="Descrizione" class="card-body">

            <p class="card-text">
                {{ $announcement->body }}
            </p>
            <p class="card-text">
                {{ $announcement->price }}
            </p>

            <section class="card-controls">
                <a class="btn shadow" href="{{ route('announcementShow', compact('announcement')) }}">Visualizza
                </a>

                @if ($announcement->category)
                    <a id="categoryBtn" class="btn shadow category-btn"
                        href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
                    </a>
                @endif

            </section>
        </section>

        <section title="Informazioni aggiuntive" class="card-footer">
            <p>
                Pubblicato il:{{ $announcement->created_at->format('d/m/Y') }}
            </p>
        </section>
    </article>

</section>
