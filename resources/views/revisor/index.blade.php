@if ($announcement_to_check)
    @php $h1= "Revisione richiesta" @endphp
@else
    @php $h1= "Tutto ok!" @endphp
@endif

<x-layoutour :$h1>

    <section class="container">

        @if ($announcement_to_check)

            @if ($announcement_to_check->images->count() > 0)

                <section class="row">
                    @foreach ($announcement_to_check->images as $image)
                        <figure
                            class=" mt-4 d-flex col-12 col-lg-5 border-top-nav border-bot-soft gradient-soft pb-5 position-relative pt-lg-4 br-small mx-lg-5">

                            <img src="{{ Storage::url($image->path) }}" class="position-relative  img-preview-revisor ">
                            @if ($image->labels)
                                <section
                                    class="position-absolute start-0 bottom-0 bg-main gradient-dark text-revisor border-bot-soft border-top-nav px-4 mx-2 border-inline-nav br-small">
                                    <span class="text-nav"> Tag Immagine: </span>

                                    @foreach ($image->labels as $label)
                                        {{ $label }}
                                    @endforeach
                                </section>
                            @endif
                            <section class="position-absolute end-0 pe-lg-5 text-revisor">
                                <p>Adulti: <span class="{{ $image->adult }}"> </span></p>
                                <p>Fraudolento:<span class="{{ $image->adult }}"> </span></p>
                                <p>Medicina: <span class="{{ $image->adult }}"> </span></p>
                                <p>Violenza: <span class="{{ $image->adult }}"> </span></p>
                                <p>Ammiccante: <span class="{{ $image->adult }}"> </span></p>
                            </section>


                        </figure>
                    @endforeach

                </section>
            @endif




            <h5 class="card-title pt-4 "><span class="text-nav">Titolo:</span> {{ $announcement_to_check->title }}</h5>
            <p class="card-text"><span class="text-nav">Descrizione: </span> {{ $announcement_to_check->body }}</p>
            @if ($announcement_to_check->category)
                <p class=""><span class="text-nav">Categoria: </span> {{ $announcement_to_check->category->name }}
                </p>
            @endif
            <p class="card-text mb-4"><span class="text-nav">Pubblicato il: </span>
                {{ $announcement_to_check->created_at->format('d/m/Y') }}
            </p>


            </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <form
                        action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success shadow">Accetta</button>
                    </form>
                </div>

                <div class="col-12 col-md-6 text-end">
                    <form
                        action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                    </form>
                </div>

            </div>
            </div>
    </section>
    @endif
    <form action="{{ route('undoLastRevision') }}" method="POST" class="text-center">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn ">Annulla ultima
            revisione</button>
    </form>
    </section>
</x-layoutour>
