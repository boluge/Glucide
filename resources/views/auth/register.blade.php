<form role="form" method="POST" action="{{ url('/auth/register') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"/>
        <label class="mdl-textfield__label" for="firstname">First Name</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}"/>
        <label class="mdl-textfield__label" for="name">Name</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}"/>
        <label class="mdl-textfield__label" for="email">E-Mail</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="password" id="password" name="password" />
        <label class="mdl-textfield__label" for="password">Password</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation" />
        <label class="mdl-textfield__label" for="password_confirmation">Confirm Password</label>
    </div>

    <div class="mdl-textfield">
        <br/>
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Register</button>
    </div>
</form>