<section title="Messaggi di Sessione" class="container-fluid">
    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="flex flex-row justify-center my-2 alert alert-warning">
            {{ session('error') }}
        </div>
    @endif

</section>
