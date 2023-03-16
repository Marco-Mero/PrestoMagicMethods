<form class="d-inline" action="{{ route('setLanguageLocale', $lang) }}" method="post">

    @csrf

    <button type="submit" class="">

        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" class="flag" />

    </button>

</form>
