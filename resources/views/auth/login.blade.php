@extends('../layouts/template')

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
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Login</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('postlogin') }}">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="email" name="email" value="{{ old('email') }}"/>
                                <label class="mdl-textfield__label" for="sample3">E-Mail Address</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                <input class="mdl-textfield__input" name="password" type="password"/>
                                <label class="mdl-textfield__label" for="sample3">Password</label>
                            </div>
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                <input type="checkbox" class="mdl-checkbox__input" name="remember" />
                                <span class="mdl-checkbox__label">Remember Me</span>
                            </label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                Login
                            </button>
                        </form>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="{{ url('/password/email') }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Get Started
                        </a>
                    </div>
                </div>
                        <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>

@endsection
