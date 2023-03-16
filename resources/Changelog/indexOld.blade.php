@if ($announcement_to_check)
    @php $h1= "Annuncio da revisionare" @endphp
@else
    @php $h1= "Nessun annuncio da revisionare" @endphp
@endif

<x-layoutour :$h1>



    @if ($announcement_to_check)
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                        
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/27/1200/200" alt=""
                                    class="img-fluid p-3 rounded">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/28/1200/200" alt=""
                                    class="img-fluid p-3 rounded">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/29/1200/200" alt=""
                                    class="img-fluid p-3 rounded">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
                    <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
                    @if ($announcement_to_check->category)
                    <p class="">Categoria: {{$announcement_to_check->category->name}}</p>
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
                <form action="{{ route('undoLastRevision') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn ">Annulla ultima
                        revisione</button>
                </form>
            </div>
            </div>
        </section>
    @endif

</x-layout>
