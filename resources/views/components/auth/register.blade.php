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
    <form method="POST" action="{{ route('register') }}">
        {{-- token --}}
        @csrf

        <div class="form-group">
            <label for="exampleInputName">nome</label>
            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp"
                placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail"
                aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword"
                placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPasswordConfirm">Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPasswordConfirm"
                placeholder="Password">
        </div>
        <p>Sei già nostro utente? <a href="{{ route('login') }}">Accedi.</a></p>
        <button type="submit" class="btn btn-primary mt-2">Registrati</button>
</section>
</form>
