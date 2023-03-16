@if ($h1 || $h2)
    <header class="text-center my-4">

        <h1 class="display-1 py-5">
            {{ $h1 }}
        </h1>

        @if ($h2)
            <h2>
                {{ $h2 }}
            </h2>
        @endif
    </header>
@endif
