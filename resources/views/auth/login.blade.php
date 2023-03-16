<x-layoutour h2="Accedi" class="vh-50">

    <section class="container text-danger">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <section class="container form-custom-leo">
        <form method="POST" action="{{ route('login') }}">
            {{-- token --}}
            @csrf
            
            <h2>Sign In</h2>

            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail"
                    aria-describedby="emailHelp" placeholder="Inserisci la tua e-mail">
            </div>

            <div class="form-group">

                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword"
                    placeholder="Inserisci la tua password">
            </div>

            <p>Sei un nuovo utente? <a href="{{ route('register') }}">Registrati.</a></p>
            <button type="submit" class="btn btn-custom_special opacity70 opacity100-focus 45-card-nav">Login</button>

        </form>
    </section>
</x-layout>
