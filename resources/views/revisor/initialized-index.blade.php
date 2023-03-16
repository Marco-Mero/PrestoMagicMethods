@if ($announcement_to_check)
    @php $h1= "Annuncio da revisionare" @endphp
@else
    @php $h1= "Nessun annuncio da revisionare" @endphp
@endif

<x-layoutour :$h1>

    <section class="container">

        @if ($announcement_to_check)

            @if ($announcement_to_check->images->count() > 0)


                {{-- @foreach ($announcement_to_check->images as $image) --}}

                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators fill-nav text-nav">
                        @foreach ($announcement_to_check->images as $key => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $key }}"
                                @if ($key == 0) class="active" @endif aria-current="true"
                                aria-label="Slide {{ $key }}"></button>
                        @endforeach
                    </div>



                    <div class="carousel-inner">

                        @foreach ($announcement_to_check->images as $key => $image)
                            <div class="carousel-item @if ($key == 0) active @endif">
                                <img class="d-block img-preview " src="{{ Storage::url($image->path) }}"
                                    alt="First slide">
                            </div>
                            <div class="position-relative">
                                {{-- <img src="{{ Storage::url($image->path) }}"> --}}
                                <section class="position-absolute end-0 bg-danger">

                                    
                                        <p>Adulti: <span class="{{ $image->adult }}"> </span></p>
                                        <p>Fraudolento:<span class="{{ $image->adult }}"> </span></p>
                                        <p>Medico: <span class="{{ $image->adult }}"> </span></p>
                                        <p>Violenza: <span class="{{ $image->adult }}"> </span></p>
                                        <p>Ammiccante: <span class="{{ $image->adult }}"> </span></p>
                                </section>
                                @if ($image->labels)
                                    <section class="position-absolute bottom-0 bg-black">
                                        <span class="text-nav">Tag Immagine: </span>

                                        @foreach ($image->labels as $label)
                                            {{ $label }}
                                        @endforeach
                                    </section>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="fa-solid fa-circle-chevron-left fa-2x text-nav" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="fa-solid fa-circle-chevron-right fa-2x text-nav" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>



                {{-- @endforeach --}}


            @endif




            <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
            <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
            @if ($announcement_to_check->category)
                <p class="">Categoria: {{ $announcement_to_check->category->name }}</p>
            @endif
            <p class="card-text mb-4">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}
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
