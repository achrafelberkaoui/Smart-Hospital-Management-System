

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label>Mot de passe</label>
                <input type="password" name="password">
            </div>
            @error('email')
            <p>{{$message}}</p>
            @enderror

            <!-- Button -->
            <button type="submit">
                Se connecter
            </button>
        </form>

        <p>
            Pas encore de compte ?
            <a href="#">
                Créer un compte
            </a>
        </p>
    </div>

</div>
