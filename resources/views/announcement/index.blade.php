<x-layoutour>



    <section class="hori-wrapper">
        @forelse ($announcements as $announcement)
            <x-announcementCard :$announcement />

        @empty
            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    <p class="lead">Non ci sono annunci per questa ricerca.</p>
                </div>
            </div>
        @endforelse

    </section>
    {{ $announcements->links() }}

</x-layout>
