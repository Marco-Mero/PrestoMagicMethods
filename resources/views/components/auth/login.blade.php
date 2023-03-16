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

<section class="container">
    <form method="POST" action="{{ route('login') }}">
        {{-- token --}}
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword"
                placeholder="Password">
        </div>

        <p>Sei un nuovo utente? <a href="{{ route('register') }}">Registrati.</a></p>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
</section>
