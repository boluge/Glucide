@extends('templates/default')

@section('title')
    Login
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mdl-grid">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Login</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <form role="form" method="POST" action="{{ route('auth.postlogin') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}"/>
                        <label class="mdl-textfield__label" for="email">E-Mail</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="password" name="password" />
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>

                    <div class="mdl-textfield">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="remember">
                            <input type="checkbox" id="remember" name="remember" class="mdl-switch__input" />
                            <span class="mdl-switch__label"> Remember Me</span>
                        </label>
                    </div>

                    <div class="mdl-textfield">
                        <br/>
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Login</button>
                    </div>
                </form>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="{{ url('/password/email') }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Forgot Your Password?
                </a>
            </div>
        </div>
        <div class="mdl-card mdl-shadow--2dp mdl-color--grey-100 mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Register</h2>
            </div>
            <div class="mdl-card__supporting-text">
                @include('../auth/register')
            </div>
        </div>
    </div>


@endsection
