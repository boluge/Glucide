@if( Auth::check() && Auth::user()->roles == 'admin' )
    <button id="admin-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon admin-button">
        <i class="material-icons">settings</i>
    </button>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect user-menu" for="admin-menu-lower-right">
        <li class="mdl-menu__item">
            <a href="{{ route('user.index') }}">
                Show all Users
            </a>
        </li>
        <li class="mdl-menu__item">
            <a href="{{ route('food.index') }}">
                Show all Foods
            </a>
        </li>
        <li class="mdl-menu__item">
            <a href="{{ route('category.index') }}">
                Show all Food's Categories
            </a>
        </li>
    </ul>
    &nbsp;
@endif