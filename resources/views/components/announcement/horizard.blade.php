{{-- TODO card cliccabile --}}
{{-- Tutte le card hanno accesso a una variabile interna $announcement di tipo Announcement --}}
<article
    class="horizard
@if ($announcement->category) hori-{{ $announcement->category->name }} @endif position-relative">

    <figure class="position-relative">
        @if (Auth::user() && Auth::user()->is_revisor)
            {{-- @php
            $announcement
        @endphp --}}

            <form action="{{ route('revisor.reject_announcement', compact('announcement')) }}" method="POST"
                class="">
                @csrf
                @method('PATCH')
                <button type="submit" id="reject{{ $announcement->id }}"
                    class="fa-solid fa-trash-can fa-2x top-0 ms-2 mt-2 position-absolute shake-hover
                    text-warning opacity70 opacity100-focus">
                    <i class=""></i>
                </button>
            </form>
        @endif
        @if (
            $announcement->images()->count() &&
                $announcement->images()->first()->hasCropped(300, 300))
            <img src="{{ $announcement->images()->first()->getUrl(300, 300) }}" alt="...">
            {{-- {{ $announcement->images()->first()->getUrl(300, 300) }} --}}
        @else
            <img src="{{ url('/media/Unknown.png') }}" class="p-4 opacity-80 pe-none" alt="...">
            <p class="opacity-80">Picture Unavailable</p>
        @endif
    </figure>

    <section title="card-body" class="card-desc">

        <h4 class="">
            {{ $announcement->title }}
        </h4>


        <p class="long-text">{{ $announcement->body }}</p>

        <ul class="grid-flow-col" title="card-controls">




            @if ($announcement->category)
                <li class="">
                    <a id="categoryBtn" class="btn-custom btn-{{ strtolower($announcement->category->name) }}"
                        href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
                    </a>
                </li>
            @endif
            <li class="lightbulb-wrapper text-end w-100">
                <a href="{{ route('announcementShow', compact('announcement')) }}">
                    <x-svg.lightbulb fill="fill-nav" />
                </a>
            </li>
        </ul>



        <p class="">
            Prezzo: {{ $announcement->price }}
        </p>





        <p title="Informazioni aggiuntive" class="text-end">

            @if ($announcement->user)
                {{ $announcement->user->name }},
            @endif
            {{ $announcement->created_at->format('d/m/Y') }}
        </p>






    </section>


</article>
