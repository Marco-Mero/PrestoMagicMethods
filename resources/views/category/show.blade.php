<x-layoutour :h1="$category->name" >

@if (count($category->announcements->where('is_accepted', true)))
        
   
<section class="hori-wrapper">

    @foreach ($category->announcements->where('is_accepted', true) as $announcement)
        
            {{-- @if ($announcement->is_accepted) --}}
            <x-announcementCard :$announcement />
            {{-- @endif --}}
       
    @endforeach
    
    </section>
     @else
        <section class="container glassy-card-details">
            <div class="col-12">
                <p class="h1">Non sono presenti annunci per questa categoria!</p>
                <p class="h2 mb-4">Pubblicane uno :
                </p>
                <a href="{{ route('announcementCreate') }}" class="btn-custom">
                    Nuovo Annuncio</a>
            </div>
        </section>
    @endif
 

    </x-layout>
