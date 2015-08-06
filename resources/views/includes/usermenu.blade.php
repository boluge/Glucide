@if(Auth::check())
    <button id="user-menu-lower-right" class="mdl-button mdl-js-button user-button">
        <?php
            $url = "http://www.gravatar.com/avatar/".md5( strtolower( trim( Auth::user()->email ) ) )."?d=".urlencode( URL::asset('img/avatar.png') )."&s=40";
        ?>
        <img class="avatar-img" src="{{ URL::asset($url) }}" alt="Avatar"/>
    </button>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect user-menu" for="user-menu-lower-right">
        <li class="mdl-menu__item">
            <a href="">
                Edit Profile & Settings
            </a>
        </li>
        <li class="mdl-menu__item ">
            <a class="mdl-color-text--red-500" href="{{ route('auth.logout') }}">
                Disconnect
            </a>
        </li>
    </ul>
@else
    <a href="{{ route('auth.getlogin') }}" class="mdl-button mdl-js-button mdl-button--icon">
        <i class="material-icons">lock_outline</i>
    </a>
@endif