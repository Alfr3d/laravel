<nav class="navbar navbar-dark bg-dark justify-between text-light">
    <a href="{{ url('/') }}" class="navbar-brand">Home Page</a>
    @if (Route::has('login'))
        <div class="form-inline">
            @auth
                <a href="{{ url('/questions') }}" class="navbar-brand">Questions</a>
                <a href="{{ url('/profile') }}" class="navbar-brand">Profile</a>
            @else
                <a href="{{ route('login') }}" class="navbar-brand">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="navbar-brand">Register</a>
                @endif
            @endauth
        </div>
    @endif
</nav>
