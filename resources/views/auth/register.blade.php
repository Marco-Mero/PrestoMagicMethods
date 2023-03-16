<x-layoutour h2="Registrati" class="vh-50">

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

        <h2 class="text-center">Sign Up</h2>

        <form method="POST" action="{{ route('register') }}">
            {{-- token --}}
            @csrf

            <div class="form-group">
                <label for="exampleInputName">Nome</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp"
                    placeholder="Inserisci il tuo nome utente">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail"
                    aria-describedby="emailHelp" placeholder="Inserisci la tua casella e-mail">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword"
                    placeholder="********">
            </div>

            <div class="form-group">
                <label for="exampleInputPasswordConfirm">Ripeti Password</label>
                <input name="password_confirmation" type="password" class="form-control"
                    id="exampleInputPasswordConfirm" placeholder="********">
            </div>
            <p>Sei già nostro utente? <a href="{{ route('login') }}">Accedi.</a></p>
            <button type="submit" class="btn btn-custom_special opacity70 opacity100-focus mt-2">Registrati</button>
    </section>
    </form>

    </x-layout>
