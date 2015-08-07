@extends('../templates/default')

@section('title')
    Edit your profile
@endsection

@section('content')
    <div class="mdl-grid">
        <form method="post" class="mdl-grid" action="{{ route('profile.update') }}">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Your settings</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="text" id="name" name="name" disabled value="{{ $user->name }}"/>
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="mail" id="name" name="name" value="{{ $user->email }}"/>
                        <label class="mdl-textfield__label" for="name">E-Mail</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="password" id="password" name="password" />
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="password_confirmation" id="password_confirmation" name="password_confirmation" />
                        <label class="mdl-textfield__label" for="password">Confirm Password</label>
                    </div>



                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Update my profile
                    </button>
                </div>
            </div>
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Your settings</h2>
                </div>
                <?php
                    $url = "http://www.gravatar.com/avatar/".md5( strtolower( trim( Auth::user()->email ) ) )."?d=".urlencode( URL::asset('img/avatar.png') )."&s=128";
                ?>
                <img class="avatar-profile-img" src="{{ URL::asset($url) }}"/>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="mail" id="name" name="name" value="{{ $user->email }}"/>
                        <label class="mdl-textfield__label" for="name">E-Mail</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="mail" id="name" name="name" value="{{ $user->email }}"/>
                        <label class="mdl-textfield__label" for="name">E-Mail</label>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Update my settings
                    </button>
                </div>
            </div>

            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Explains</h2>
                </div>
                <div class="mdl-card__supporting-text">
                </div>
            </div>
        </form>
    </div>
@endsection