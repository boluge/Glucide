<nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="{{ route('home') }}">Home</a>
    @if( Auth::check() )
        <a class="mdl-navigation__link" href="{{ route('meal.index') }}">Meals</a>
    @endif
    @if( !Auth::check() )
        <a class="mdl-navigation__link" href="{{ route('register') }}">Register</a>
        <a class="mdl-navigation__link" href="{{ route('login') }}">Login</a>
    @endif
    @if( Auth::check() )
        <a class="mdl-navigation__link" href="{{ route('logout') }}">Logout</a>
    @endif
</nav>