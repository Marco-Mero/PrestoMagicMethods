@if ($announcement->images->count() > 0)

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators fill-nav text-nav">
            @foreach ($announcement->images as $key => $image)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                    @if ($key == 0) class="active" @endif aria-current="true"
                    aria-label="Slide {{ $key }}"></button>
            @endforeach
        </div>



        <div class="carousel-inner">

            @foreach ($announcement->images as $key => $image)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img class="d-block img-preview" src="{{ Storage::url($image->path) }}" alt="First slide">
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

@endif
{{-- @if ($announcement->images->count() > 0)
        <section class="flex-scroll mb-4">
            @foreach ($announcement->images as $image)
                <figure>
                    <img src="{{ Storage::url($image->path) }}">
                </figure>
            @endforeach
        </section>
    @endif --}}

<section>
    <h4 class="card-title mb-2"><span class="text-nav "> Titolo: </span>{{ $announcement->title }}</h4>
    <p class="card-text min-height-tall"><span class="text-nav py-1">Descrizione: </span>{{ $announcement->body }}
    </p>


    <p class="card-text mb-4 pb-4"><span class="text-nav py-1">Prezzo: </span>{{ $announcement->price }}</p>

    <a class=" btn-custom me-4" href="{{ route('home') }}">Home</a>

    @if ($announcement->category)
        <a class="btn-custom " href="{{ route('categoryShow', ['category' => $announcement->category]) }}">
            {{ $announcement->category->name }}
        </a>
    @endif

    <section class="d-flex justify-content-between align-items-end pt-4 mt-4">
        <p class="card-footer mt-2 text-end d-block"> <span class="text-nav py-1 pe-2">Pubblicato il:
            </span>{{ $announcement->created_at->format('d/m/Y') }}</p>

        @if ($announcement->user)
            <p class="d-block"><span class="text-nav py-1 pe-2 ">Da: </span> {{ $announcement->user->name }}</p>
        @endif
    </section>
</section>
